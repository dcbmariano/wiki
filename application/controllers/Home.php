<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index($id = NULL)
	{
		if(isset($id)){
			$this->template->show($id);
		}
		else{
			$this->template->show('home');
		}
		
	}
}
