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
 * Google Calendar Settings HTTP client.
 *
 * This module implements the Google Calendar Settings related HTTP requests.
 */
App.Http.GoogleCalendarSettings = (function () {
    /**
     * Save Google Calendar settings.
     *
     * @param {Array} googleCalendarSettings
     *
     * @return {*|jQuery}
     */
    function save(googleCalendarSettings) {
        const url = App.Utils.Url.siteUrl('google_calendar_settings/save');

        const data = {
            csrf_token: vars('csrf_token'),
            google_calendar_settings: googleCalendarSettings,
        };

        return $.post(url, data);
    }

    return {
        save,
    };
})();
