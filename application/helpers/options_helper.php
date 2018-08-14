<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * get_option()
 *
 * Loads an option value from the database
 *
 * @param   array  $option_name
 * @return  string
 */

if(!function_exists('get_option')) {

    function get_option(string $option_name = "") {
        $ci = get_instance();

        $table_name = $ci->db->dbprefix.'options';
        $sql = "SELECT value FROM $table_name WHERE name = ?";

        $q = $ci->db->conn_id->prepare($sql);

        //binding option using PDO
        $q->bindValue(1, $option_name, PDO::PARAM_INT);
        $q->execute();
        return $q->fetch(PDO::FETCH_ASSOC)['value'];
    }
}
