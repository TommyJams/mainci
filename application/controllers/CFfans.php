<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CFfans extends CI_Controller{

	public function fanPage(){

		$this->load->model('Model');
        $data['featuredCampaigns'] = json_encode($this->Model->getFeaturedCampaign());
		$this->load->view('fanPage_view', $data);
	}

	public function campaignPage(){

		// Loading Model class
		$this->load->model('Model');

	    $campaign_id = $this->uri->segment(2);
	    parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

		//error_log("Camp Id: ".$campaign_id);

	    if(isset($_GET['code']))
	    {
	      $data['fbEvent'] = json_encode($this->Model->joinFBEvent($_GET['code'],$campaign_id));
	    }

	    $data['campaign'] = json_encode($this->Model->campaignDetails($campaign_id));
		$this->load->view('campaign_view', $data);
	}

	public function ticketCount(){

		// Loading Model class
		$this->load->model('Model');
		$this->Model->ticketCount();
	}

	public function storeFanData(){

		// Loading Model class
		$this->load->model('Model');

		$this->Model->storeFanData();
	}

	public function payment(){

		// Loading Model class
		$this->load->model('Model');

		$campaign_id = $this->uri->segment(2);

		// Getting code from URL
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

	   	// Loading model to store user's fb data
	   	$data['fanData'] = json_encode($this->Model->fanDetails($campaign_id,$_GET['code']));

		// Get campaign details	   
		$data['campaign'] = json_encode($this->Model->campaignDetails($campaign_id));

		$this->load->view('payment_view', $data);
	}

	public function ticket(){

		$this->load->model('Model');
        $data['featuredCampaigns'] = json_encode($this->Model->getFeaturedCampaign());

        $this->Model->ticketDetails();

		$this->load->view('ticketpage_view', $data);
	}
}
