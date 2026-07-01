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
 * File utility.
 *
 * This module implements the functionality of files.
 */
window.App.Utils.File = (function () {
    /**
     * Convert a file to a base 64 string.
     *
     * @param {File} file
     *
     * @return {Promise}
     */
    function toBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = (error) => reject(error);
        });
    }

    return {
        toBase64,
    };
})();
