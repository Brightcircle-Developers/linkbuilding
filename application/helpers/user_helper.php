<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * user_logged_in()
 *
 * Checks if the current user is logged in
 *
 * @return  bool
 */

if(!function_exists('user_logged_in')) {

    function user_logged_in() {
        $ci = get_instance();

        if($ci->session->userdata('username')) {
            return true;
        }
        return false;
    }
}

/**
 * has_permissions()
 *
 * Checks if the current user is one of the user levels
 * Admin, User, Guest....
 *
 * @param   string  $valid_level
 * @return  bool
 */

if(!function_exists('has_permissions')) {

    function has_permissions(array $permissions) {
        if(!user_logged_in()) {
            return;
        }
        $ci = get_instance();
        $user_permissions = $ci->session->userdata['permissions'];
        foreach($permissions as $permission) {
            if($user_permissions[$permission] == 0) {
                return false;
            }
        }

        return true;
    }
}

/**
 * login_user()
 *
 * Logs in the give user
 *
 * @param   string      $username
 * @return  bool
 */

if(!function_exists('login_user')) {

    function login_user(string $username) {
        $ci = get_instance();

        $table_name = $ci->db->dbprefix.'users';

        $user = db_get_row($table_name, array('username' => $username));
        //Translate decoded permissions
        $user_permissions = array();
        if(!empty($user['permissions'])) {
            $permissions = explode(',', $user['permissions']);
            foreach($permissions as $permission) {
                $permission_data = explode('=', $permission);
                if($permission_data[1] == 1) {$permission_data[1] = 1;}
                else {$permission_data[1] = 0;}
                $user_permissions[$permission_data[0]] = $permission_data[1];
            }
        }

        $userdata = array(
            'id' => $user['id'],
            'username' => $user['username'],
            'level' => $user['level'],
            'date_created' => $user['date_created'],
            'permissions' => $user_permissions,
            'image' => $user['image']
        );

        $ci->session->set_userdata($userdata);
    }
}

/**
 * logout_user()
 *
 * Logs out the current logged in user
 *
 * @return  void
 */

if(!function_exists('logout_user')) {

    function logout_user() {
        $ci = get_instance();
        $userdata = array(
            'id',
            'username',
            'level',
            'date_created',
            'permissions'
        );
        $ci->session->unset_userdata($userdata);
    }
}

/**
 * user_new()
 *
 * Creates a new user based on given inputs
 *
 * @return  void
 */

if(!function_exists('user_new')) {
    function user_new($userdata) {
        $ci = get_instance();
        $table_name = $ci->db->dbprefix.'users';

        db_insert($table_name, $userdata);
    }
}
