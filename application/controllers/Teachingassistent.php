<?php
/**
 * Created by PhpStorm.
 * User: wenop
 * Date: 11/19/2018
 * Time: 9:19 PM
 */

class Teachingassistent extends CI_Controller
{
	public function dashboard()
	{
		// todo This will be load after authentication
		$data['ta_firstname'] = 'Jackson';

		// todo Render TA dashboard here
		$this->load->view('dashboard_ta', $data);
	}
}
