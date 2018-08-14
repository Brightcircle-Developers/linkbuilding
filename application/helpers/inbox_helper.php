<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * message_add()
 *
 * Creates a new inbox message for the given user.
 *
 * @param   string  $line
 * @return  string
 */

if(!function_exists('message_add')) {

    function message_add() {
        //Title             {TITLE}
        //Message           {MESSAGE}
        //From              {USER}
        //To                {USER}
        //Status            {READ / SENT}
        //Datetime_sent     {DATETIME}

        $message = array(
            'name' => 'name',
            'icon' => 'pencil',
            'title' => 'title',
            'message' => 'message',
            'user_id_from' => 1,
            'user_id_to' => 2,
            'status' => 'sent'
        );

        message_send($message);
    }
}

/**
 * message_send()
 *
 * Sends a newly created message
 *
 * @param   array   $message
 * @return  string
 */

if(!function_exists('message_send')) {

    function message_send($message) {
        $ci = get_instance();
        $table_name = $ci->db->dbprefix.'messages';

        db_insert($table_name, $message);
    }
}
