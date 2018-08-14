<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_users() {
        $table_name = $this->db->dbprefix.'users';

        $users = db_get_rows($table_name, array());
        return $users;
    }

    function get_user($user_id) {
        $table_name = $this->db->dbprefix.'users';

        $user = db_get_row($table_name, array('id' => $user_id));

        return $user;
    }

    function get_levels() {
        $table_name = $this->db->dbprefix.'userlevels';

        $levels = db_get_rows($table_name, array());

        return $levels;
    }
    function get_levels_dropdown_options($levels) {
        if(empty($levels)){
            return;
        }
        $level_options = array();
        foreach($levels as $level) {
            $level_options[$level['name']] = $level['title'];
        }
        return $level_options;
    }

    function user_add() {
        if($this->input->post('adduser_username')) {
            if($this->input->post('adduser_password') == $this->input->post('adduser_passwordredo')) {
                $input_password_salt = password_hash($this->input->post('adduser_password'), PASSWORD_DEFAULT);
            }
            else {
                modal_add('Password authentication failed', 'modalFormRegisterFail', 'error', 5, 'ERROR: Given password is not identical to password redo.');
                return;
            }
            $input_username = make_valid_name($this->input->post('adduser_username'));
            $input_level = $this->input->post('adduser_level');

            $permissions_default = 'view_all_sisters=0,view_all_users=0';

            $table_name = $this->db->dbprefix.'users';

            $data = array(
                'username' => $input_username,
                'level' => $input_level,
                'date_created' => date('Y-m-d'),
                'salt' => $input_password_salt,
                'permissions' => $permissions_default
            );

            user_new($data);
        }
    }
}
