<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sisters_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_sisters() {
        $table_name = $this->db->dbprefix.'sisterpages';

        if($this->session->userdata('permissions')['view_all_sisters'] == 1) {
            $where = array();
        }
        else {
            $where = array(
                'user_id' => $this->session->userdata('id')
            );
        }

        $sisters = db_get_rows($table_name, $where);
        return $sisters;
    }

    function get_sisters_index() {
        $table_name = $this->db->dbprefix.'sisterpages';

        $filter_string = $this->input->post('sisterindex_name');
        $sisters = db_get_rows($table_name, array());
        foreach($sisters as $sister) {
            if($filter_string == NULL) {
                $sister_results[] = $sister;
            }
            elseif(strpos(strtolower($sister['name_slug']), strtolower($filter_string)) !== false) {
                $sister_results[] = $sister;
            }
        }

        return $sister_results;
    }

    function get_sister_name($sister_name_slug) {
        $table_name = $this->db->dbprefix.'sisterpages';

        $sister = db_get_row($table_name, array('name_slug' => $sister_name_slug));
        return $sister;
    }

    function get_topics($sister_id) {
        $table_name = $this->db->dbprefix.'topics';

        $topics = db_get_rows($table_name, array('sisterpage_id' => $sister_id));
        return $topics;
    }

    function get_backlinks($topic_id) {
        $table_name = $this->db->dbprefix.'backlinks';

        $backlinks = db_get_rows($table_name, array('topic_id' => $topic_id));
        return $backlinks;
    }

    function topic_new($sister_id) {
        if($this->input->post('newtopic_submit')) {
            $rules = array(
                array(
                    'field' => 'newtopic_name',
                    'label' => 'Name',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($rules);

            $input_name = make_valid_name($this->input->post('newtopic_name'));
            $input_name_slug = make_slug($input_name);
            $input_sister_id = $sister_id;

            $table_name = $this->db->dbprefix.'topics';

            if(db_get_var($table_name, 'name_slug', array('name_slug' => $input_name_slug))) {
                modal_add('Topic name already exists', 'modalFormNewtopicFail', 'error', 5, 'ERROR: There already exists a topic with that name, please use another name for your topic.');
                return;
            }

            $data = array(
                'name' => $input_name,
                'name_slug' => $input_name_slug,
                'sisterpage_id' => $input_sister_id
            );

            db_insert($table_name, $data);
        }
    }

    function backlink_new($sister_id, $user_id) {
        if($this->input->post('newbacklink_submit')) {
            $rules = array(
                array(
                    'field' => 'newbacklink_anchortag',
                    'label' => 'Anchortag',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'newbacklink_link',
                    'label' => 'Link',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($rules);

            $input_anchortag = make_valid_name($this->input->post('newbacklink_anchortag'));
            $input_anchortag_slug = make_slug($input_anchortag);
            $input_link = make_valid_name($this->input->post('newbacklink_link'));
            $input_user_id = $user_id;
            $input_topic_id = $this->input->post('newbacklink_topic');
            $input_sister_id = $sister_id;

            $table_name = $this->db->dbprefix.'backlinks';

            $data = array(
                'anchortag' => $input_anchortag,
                'anchortag_slug' => $input_anchortag_slug,
                'link' => $input_link,
                'user_id' => $input_user_id,
                'topic_id' => $input_topic_id,
                'sisterpage_id' => $input_sister_id
            );

            db_insert($table_name, $data);
        }
    }

    function get_topics_dropdown_options($topics) {
        if(empty($topics)){
            return;
        }
        $topic_options = array();
        foreach($topics as $topic) {
            $topic_options[$topic['id']] = $topic['name'];
        }
        return $topic_options;
    }
}
