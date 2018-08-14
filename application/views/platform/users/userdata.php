<?php
if (!$this->input->is_ajax_request()) {
    redirect('home');
}

$table_name = $this->db->dbprefix.'users';

switch($filter_type) {
    case 'id.0-9': $sql = "SELECT id, username, level FROM $table_name ORDER BY id"; break;
    case 'id.9-0': $sql = "SELECT id, username, level FROM $table_name ORDER BY id DESC"; break;
    case 'name.a-z': $sql = "SELECT id, username, level FROM $table_name ORDER BY username"; break;
    case 'name.z-a': $sql = "SELECT id, username, level FROM $table_name ORDER BY username DESC"; break;

    case 'level.0-9': $sql = "SELECT id, username, level FROM $table_name ORDER BY level"; break;
    case 'level.9-0': $sql = "SELECT id, username, level FROM $table_name ORDER BY level DESC"; break;

    default: $sql = "SELECT id, username, level FROM $table_name";
}

$users = db_query($sql, array());
echo json_encode($users);
