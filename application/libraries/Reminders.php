<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <contact@mariners-appointment.org>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.6.0
 * ---------------------------------------------------------------------------- */

/**
 * Reminders library.
 *
 * Sends reminder emails for upcoming appointments. Intended to be triggered periodically
 * through the "console reminders" command (e.g. from a cronjob).
 *
 * @package Libraries
 */
class Reminders
{
    /**
     * @var EA_Controller|CI_Controller
     */
    protected EA_Controller|CI_Controller $CI;

    /**
     * Reminders constructor.
     */
    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('appointments_model');
        $this->CI->load->model('customers_model');
        $this->CI->load->model('providers_model');
        $this->CI->load->model('services_model');
        $this->CI->load->model('settings_model');

        $this->CI->load->library('notifications');
    }

    /**
     * Send reminders for all upcoming appointments that are due within the configured time window.
     *
     * An appointment is considered "due" when it starts in the future, within the configured number
     * of hours from now, and no reminder has been sent for it yet. Every processed appointment is
     * flagged (reminder_sent) so that a reminder is delivered at most once.
     *
     * @throws Exception
     */
    public function run(): void
    {
        if (!filter_var(setting('appointment_reminders'), FILTER_VALIDATE_BOOLEAN)) {
            response(PHP_EOL . '⇾ Appointment reminders are disabled.' . PHP_EOL . PHP_EOL);
            return;
        }

        $hours = (int) setting('appointment_reminder_hours');

        if ($hours <= 0) {
            $hours = 24;
        }

        $now = date('Y-m-d H:i:s');
        $window_end = date('Y-m-d H:i:s', strtotime('+' . $hours . ' hours'));

        $appointments = $this->CI->db
            ->where('is_unavailability', false)
            ->where('reminder_sent IS NULL', null, false)
            ->where('start_datetime >=', $now)
            ->where('start_datetime <=', $window_end)
            ->get('appointments')
            ->result_array();

        if (empty($appointments)) {
            response(PHP_EOL . '⇾ No upcoming appointments require a reminder.' . PHP_EOL . PHP_EOL);
            return;
        }

        $company_color = setting('company_color');

        $settings = [
            'company_name' => setting('company_name'),
            'company_link' => setting('company_link'),
            'company_email' => setting('company_email'),
            'company_color' =>
                !empty($company_color) && $company_color != DEFAULT_COMPANY_COLOR ? $company_color : null,
            'date_format' => setting('date_format'),
            'time_format' => setting('time_format'),
        ];

        $sent_count = 0;

        foreach ($appointments as $appointment_row) {
            try {
                $appointment = $this->CI->appointments_model->find((int) $appointment_row['id']);

                $service = $this->CI->services_model->find((int) $appointment['id_services']);
                $provider = $this->CI->providers_model->find((int) $appointment['id_users_provider']);
                $customer = $this->CI->customers_model->find((int) $appointment['id_users_customer']);

                $this->CI->notifications->notify_appointment_reminder(
                    $appointment,
                    $service,
                    $provider,
                    $customer,
                    $settings,
                );

                $this->CI->db->update(
                    'appointments',
                    ['reminder_sent' => date('Y-m-d H:i:s')],
                    ['id' => $appointment['id']],
                );

                $sent_count++;

                response('⇾ Sent reminder for appointment ID: ' . $appointment['id'] . PHP_EOL);
            } catch (Throwable $e) {
                log_message(
                    'error',
                    'Reminders - Could not send reminder for appointment (' .
                        ($appointment_row['id'] ?? '-') .
                        ') : ' .
                        $e->getMessage(),
                );

                response('⇾ Failed to send reminder for appointment ID: ' . $appointment_row['id'] .
                    ' - ' . $e->getMessage() . PHP_EOL);
            }
        }

        response(PHP_EOL . "⇾ Reminder run completed. Sent {$sent_count} reminder(s)." . PHP_EOL . PHP_EOL);
    }
}
