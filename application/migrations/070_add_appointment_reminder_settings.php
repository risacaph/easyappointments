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
 * Migration: Add appointment reminder settings.
 *
 * Adds settings that control the automatic appointment reminder emails, sent by
 * the "console reminders" command. When "appointment_reminders" is disabled no
 * reminders are sent. "appointment_reminder_hours" defines how many hours before
 * the appointment start the reminder should be delivered.
 */
class Migration_Add_appointment_reminder_settings extends EA_Migration
{
    /**
     * Upgrade method.
     */
    public function up(): void
    {
        if (empty($this->db->get_where('settings', ['name' => 'appointment_reminders'])->row_array())) {
            $this->db->insert('settings', [
                'name' => 'appointment_reminders',
                'value' => '0',
            ]);
        }

        if (empty($this->db->get_where('settings', ['name' => 'appointment_reminder_hours'])->row_array())) {
            $this->db->insert('settings', [
                'name' => 'appointment_reminder_hours',
                'value' => '24',
            ]);
        }
    }

    /**
     * Downgrade method.
     */
    public function down(): void
    {
        $this->db->delete('settings', ['name' => 'appointment_reminders']);
        $this->db->delete('settings', ['name' => 'appointment_reminder_hours']);
    }
}
