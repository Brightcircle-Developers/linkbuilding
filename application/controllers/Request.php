<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Request extends LB_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function aul() {
        $data['filter_type'] = $this->input->post('filterType');

        $this->load->view('request/aul', $data);
    }

    public function abl() {
        $data['filter_string'] = $this->input->post('filterString');
        $data['sister_id'] = $this->input->post('sisterId');

        $this->load->view('request/abl', $data);
    }
}
