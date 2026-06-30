<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <[YOUR_CONTACT_EMAIL]>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

class Migration_Add_api_token_setting extends EA_Migration
{
    /**
     * Upgrade method.
     *
     * @throws Exception
     */
    public function up(): void
    {
        if (!$this->db->get_where('settings', ['name' => 'api_token'])->num_rows()) {
            $this->db->insert('settings', [
                'name' => 'api_token',
                'value' => '',
            ]);
        }
    }

    /**
     * Downgrade method.
     *
     * @throws Exception
     */
    public function down(): void
    {
        if ($this->db->get_where('settings', ['name' => 'api_token'])->num_rows()) {
            $this->db->delete('settings', ['name' => 'api_token']);
        }
    }
}
