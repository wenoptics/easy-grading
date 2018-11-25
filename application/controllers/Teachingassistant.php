<?php
/**
 * Created by PhpStorm.
 * User: wenop
 * Date: 11/19/2018
 * Time: 9:19 PM
 */

class Teachingassistant extends CI_Controller
{
	// Access `http://<hostname>/index.php/teachingassistant/dashboard` to find out
	public function dashboard()
	{
		// todo This will be load after authentication
		$data['ta_firstname'] = 'Jackson';

		// todo Render TA dashboard here
		$this->load->view('dashboard_ta', $data);
	}
}
