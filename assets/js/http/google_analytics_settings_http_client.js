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

/**
 * Google Analytics Settings HTTP client.
 *
 * This module implements the Google Analytics settings related HTTP requests.
 */
App.Http.GoogleAnalyticsSettings = (function () {
    /**
     * Save Google Analytics settings.
     *
     * @param {Object} googleAnalyticsSettings
     *
     * @return {Object}
     */
    function save(googleAnalyticsSettings) {
        const url = App.Utils.Url.siteUrl('google_analytics_settings/save');

        const data = {
            csrf_token: vars('csrf_token'),
            google_analytics_settings: googleAnalyticsSettings,
        };

        return $.post(url, data);
    }

    return {
        save,
    };
})();
