<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Azurepage extends CI_Controller{

	public function index(){
		 $this->landingPage();
	}

	public function azurelanding(){
		$this->load->view('azure_view');
	}

	public function temp(){
		$this->load->view('temp_view');
	}

	public function landingPage(){
		
		$this->load->model('Model');
        $data['featuredCampaigns'] = json_encode($this->Model->getFeaturedCampaign());

		$this->load->view('landingpage_view', $data);
	}
}
?>