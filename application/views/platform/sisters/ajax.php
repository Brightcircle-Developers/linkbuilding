<?php
if (!$this->input->is_ajax_request()) {
    redirect('home');
}
$table_name = $this->db->dbprefix.'backlinks';
$sister_backlinks = db_get_rows($table_name, array('sisterpage_id' => $sister_id));
$backlinks_results = array();
foreach($sister_backlinks as $backlink) {
    if($filter_string == NULL) {
        $backlinks_results[] = $backlink;
    }
    elseif(strpos(strtolower($backlink['anchortag']), strtolower($filter_string)) !== false) {
        $backlinks_results[] = $backlink;
    }
}
echo json_encode($backlinks_results);
