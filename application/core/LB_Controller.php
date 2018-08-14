<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LB_Controller extends CI_Controller {
    public $mollie;

    public function __construct() {
        parent::__construct();

        $this->config->load('modals');

        $this->load->helper('user');
        $this->load->helper('url');
        $this->load->helper('theme');
        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('lang');
        $this->load->helper('html');
        $this->load->helper('query');
        $this->load->helper('inbox');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();

        $this->lang->load(array('pages'));
        $this->lang->load(array('forms'));

        message_add();
    }
}
