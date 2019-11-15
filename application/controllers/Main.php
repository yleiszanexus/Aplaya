<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function pageNotFound(){
		$this->load->view('templates/404');
	}

}