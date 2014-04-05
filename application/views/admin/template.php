<?php 
$data = array();

$this->load->view('templates/admin_header');

$this->load->view($page, $data);

$this->load->view('templates/admin_footer');

?>