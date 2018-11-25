<?php
/**
 * Created by PhpStorm.
 * User: wenop
 * Date: 11/19/2018
 * Time: 9:16 PM
 */

require(APPPATH.'models/Student_model.php');
class Teachingassistant_model extends Student_model
{
	public $instructor_list;

	public function __construct()
	{
		//$this->load->database();
	}

	public function get_instructor_list()
	{
		//todo
		return array(
			$this->pitt_id."'s instructor 1",
			$this->pitt_id."'s instructor 2",
			$this->pitt_id."'s instructor 3"
		);
	}
}
