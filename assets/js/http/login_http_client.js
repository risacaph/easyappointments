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
 * Login HTTP client.
 *
 * This module implements the account login related HTTP requests.
 */
App.Http.Login = (function () {
    /**
     * Perform an account recovery.
     *
     * @param {String} username
     * @param {String} password
     * @param {String} captcha
     * @param {String} altchaPayload
     *
     * @return {Object}
     */
    function validate(username, password, captcha, altchaPayload) {
        const url = App.Utils.Url.siteUrl('login/validate');

        const data = {
            csrf_token: vars('csrf_token'),
            username,
            password,
        };

        if (captcha) {
            data.captcha = captcha;
        }
        
        if (altchaPayload) {
            data.altcha_payload = altchaPayload;
        }

        return $.post(url, data);
    }

    return {
        validate,
    };
})();
