<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Mariners Appointment - Open Source Web Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <contact@mariners-appointment.org>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://mariners-appointment.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

class Migration_Drop_delete_datetime_column_from_all_tables extends EA_Migration
{
    /**
     * @var string[]
     */
    protected $tables = [
        'appointments',
        'categories',
        'consents',
        'roles',
        'services',
        'settings',
        'users',
        'webhooks',
    ];

    /**
     * Upgrade method.
     */
    public function up(): void
    {
        foreach ($this->tables as $table) {
            if ($this->db->field_exists('delete_datetime', $table)) {
                $this->dbforge->drop_column($table, 'delete_datetime');
            }
        }
    }

    /**
     * Downgrade method.
     */
    public function down(): void
    {
        foreach ($this->tables as $table) {
            if (!$this->db->field_exists('delete_datetime', $table)) {
                $fields = [
                    'delete_datetime' => [
                        'type' => 'DATETIME',
                        'null' => true,
                        'after' => 'update_datetime',
                    ],
                ];

                $this->dbforge->add_column($table, $fields);
            }
        }
    }
}
