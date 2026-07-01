/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <[YOUR_CONTACT_EMAIL]>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.6.0
 * ---------------------------------------------------------------------------- */

/**
 * Jitsi Settings HTTP client.
 *
 * This module implements the Jitsi settings related HTTP requests.
 */
App.Http.JitsiSettings = (function () {
    /**
     * Save Jitsi settings.
     *
     * @param {Array} jitsiSettings
     *
     * @return {Object}
     */
    function save(jitsiSettings) {
        const url = App.Utils.Url.siteUrl('jitsi_settings/save');

        const data = {
            csrf_token: vars('csrf_token'),
            jitsi_settings: jitsiSettings,
        };

        return $.post(url, data);
    }

    return {
        save,
    };
})();
