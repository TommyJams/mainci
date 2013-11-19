<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Azurepage extends CI_Controller{

	public function index(){
		 $this->landingPage();
	}

	public function azurelanding(){
		$this->load->view('azure_view');
	}

	public function landingPage(){
		
		$this->load->model('Model');
        $data['featuredCampaigns'] = json_encode($this->Model->getFeaturedCampaign());

		$this->load->view('landingpage_view', $data);
	}

	public function portal(){

		// Loading Model class
		$this->load->model('Model');
		$campaign_id = 152;

		$data['campaign'] = json_encode($this->Model->campaignDetails($campaign_id));
		$this->load->view('paymentportal_view', $data);
	}

	public function payment(){

		// Loading Model class
		$this->load->model('Model');
		$campaign_id = 152;

		$data['campaign'] = json_encode($this->Model->campaignDetails($campaign_id));
		$this->load->view('payment_view', $data);
	}
}
?>