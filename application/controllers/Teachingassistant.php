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
		$this->load->model('Teachingassistant_model');

		// todo This will be load after authentication
		$ta = new $this->Teachingassistant_model();
		$ta->pitt_id = 'jsn42';
		$ta->firstname = 'Jackson';

		$data['ta_firstname'] = $ta->firstname;
		$data['instructor_list'] = $ta->get_instructor_list();

		// todo Render TA dashboard here
		$this->load->view('dashboard_ta', $data);
	}
}
