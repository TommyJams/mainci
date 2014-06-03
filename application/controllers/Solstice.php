<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solstice extends MY_Controller{

	public function solsticeLanding(){
		$this->load->view('solstice_view');
	}

}
?>