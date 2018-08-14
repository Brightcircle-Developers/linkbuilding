<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * _e()
 *
 * This function manages multi-language text output via a simple echo
 * based on the current language file.
 *
 * @param   string  $line
 * @return  string
 */

if(!function_exists('_e')) {

    function _e($line = "") {
        $ci = get_instance();

        return $ci->lang->line($line);
    }
}
