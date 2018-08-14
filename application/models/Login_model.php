<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function user_login() {
        if($this->input->post('login_submit')) {
            $rules = array(
                array(
                    'field' => 'login_username',
                    'label' => 'Username',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'login_password',
                    'label' => 'Password',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($rules);

            $input_username = $this->input->post('login_username');
            $input_password = $this->input->post('login_password');

            $table_name = $this->db->dbprefix.'users';

            $db_hash = (string) db_get_var($table_name, 'salt', array('username' => $input_username));

            if (password_verify($input_password, $db_hash)) {
                modal_add('Logged in successfully', 'modalFormLogin', 'notice', 3, 'You have been successfully logged in.');
                login_user($input_username);
            } else {
                modal_add('Login authentication failed', 'modalFormLoginFail', 'error', 3, 'ERROR: Invalid username/password.<br />Please check your username and/or password.');
            }
        }
    }

    function user_register() {
        if($this->input->post('register_password')) {
            if($this->input->post('password') == $this->input->post('passwordredo')) {
                $input_password_salt = password_hash($this->input->post('register_password'), PASSWORD_DEFAULT);
            }
            else {
                modal_add('Password authentication failed', 'modalFormRegisterFail', 'error', 5, 'ERROR: Given password is not identical to password redo.');
                return;
            }
            $input_username = make_valid_name($this->input->post('register_username'));

            $permissions_default = 'view_all_sisters=0,view_all_users=0';

            $table_name = $this->db->dbprefix.'users';

            $data = array(
                'username' => $input_username,
                'level' => 'user',
                'date_created' => date('Y-m-d'),
                'salt' => $input_password_salt,
                'permissions' => $permissions_default
            );

            user_new($data);
        }
    }
}
