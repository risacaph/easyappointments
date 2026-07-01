<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <[YOUR_CONTACT_EMAIL]>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.5.0
 * ---------------------------------------------------------------------------- */

class Migration_Rename_service_categories_table_to_categories extends EA_Migration
{
    /**
     * Upgrade method.
     */
    public function up(): void
    {
        if ($this->db->table_exists('service_categories')) {
            $this->dbforge->rename_table('service_categories', 'categories');
        }
    }

    /**
     * Downgrade method.
     */
    public function down(): void
    {
        if ($this->db->table_exists('categories')) {
            $this->dbforge->rename_table('categories', 'service_categories');
        }
    }
}
