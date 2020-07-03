<?php

function authentication()
{
	$ci = get_instance();
	$role = $ci->session->userdata('role');

	if (!$ci->session->userdata('id')) {
		redirect('page');
	}
	elseif ($role == 'admin') {
		admin_auth();
	}
	elseif ($role == 'user') {
		user_auth();
	}
	
}

function admin_auth()
{
	$ci = get_instance();

	$role = $ci->session->userdata('role');
	if ($role != 'admin') {
		redirect('user');
	}
}

function user_auth()
{
	$ci = get_instance();

	$role = $ci->session->userdata('role');
	if ($role != 'user') {
		redirect('admin');
	}
}

?>