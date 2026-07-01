/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <contact@mariners-appointment.org>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.5.0
 * ---------------------------------------------------------------------------- */

/**
 * ALTCHA Settings HTTP client.
 *
 * This module implements the ALTCHA settings related HTTP requests.
 */
App.Http.AltchaSettings = (function () {
    /**
     * Save ALTCHA settings.
     *
     * @param {Array} altchaSettings
     *
     * @return {Object}
     */
    function save(altchaSettings) {
        const url = App.Utils.Url.siteUrl('altcha_settings/save');

        const data = {
            csrf_token: vars('csrf_token'),
            altcha_settings: altchaSettings,
        };

        return $.post(url, data);
    }

    /**
     * Generate a new HMAC key.
     *
     * @return {Object}
     */
    function generateKey() {
        const url = App.Utils.Url.siteUrl('altcha_settings/generate_key');

        const data = {
            csrf_token: vars('csrf_token'),
        };

        return $.post(url, data);
    }

    return {
        save,
        generateKey,
    };
})();
