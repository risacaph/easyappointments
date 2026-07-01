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
 * Migration: Add reminder_sent column to the appointments table.
 *
 * Stores the timestamp at which a reminder email was sent for an appointment so
 * that the "console reminders" command never sends duplicate reminders.
 */
class Migration_Add_reminder_sent_column_to_appointments_table extends EA_Migration
{
    /**
     * Upgrade method.
     */
    public function up(): void
    {
        if (!$this->db->field_exists('reminder_sent', 'appointments')) {
            $fields = [
                'reminder_sent' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'after' => 'status',
                ],
            ];

            $this->dbforge->add_column('appointments', $fields);
        }
    }

    /**
     * Downgrade method.
     */
    public function down(): void
    {
        if ($this->db->field_exists('reminder_sent', 'appointments')) {
            $this->dbforge->drop_column('appointments', 'reminder_sent');
        }
    }
}
