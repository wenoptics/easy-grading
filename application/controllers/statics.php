<?php
/**
 * Created by PhpStorm.
 * User: wenop
 * Date: 12/5/2018
 * Time: 3:14 PM
 */

class Statics extends CI_Controller
{
    public function serve($path)
    {
        //echo $path;
        $this->load->view('/static/' . $path);
    }
}