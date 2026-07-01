<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Mariners Appointment - Online Appointment Scheduler
 *
 * @package     Mariners Appointment
 * @author      A.Tselegidis <contact@mariners-appointment.org>
 * @copyright   Copyright (c) Alex Tselegidis
 * @license     https://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        https://mariners-appointment.org
 * @since       v1.1.0
 * ---------------------------------------------------------------------------- */

if (!function_exists('lang')) {
    /**
     * Lang
     *
     * Fetches a language variable and optionally outputs a form label
     *
     * @param string $line The language line.
     * @param string $for The "for" value (id of the form element).
     * @param array $attributes Any additional HTML attributes.
     *
     * @return string
     */
    function lang(string $line, string $for = '', array $attributes = []): string
    {
        /** @var EA_Controller $CI */
        $CI = get_instance();

        $result = $CI->lang->line($line);

        if ($for !== '') {
            $result = '<label for="' . $for . '"' . _stringify_attributes($attributes) . '>' . $result . '</label>';
        }

        return $result ?: $line;
    }
}
