<?php 
$data = array();

$this->load->view('templates/admin_header');

if (isset($side))
	$data['sidemenu'] = $this->load->view($side, null, true);

$this->load->view($page, $data);

$this->load->view('templates/admin_footer');

?>