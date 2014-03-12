<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Azurepage extends CI_Controller{

    function __construct()
    {
        // Call the parent constructor
        parent::__construct();

        // Language
        if(strstr(current_url(),'es.tommyjams.com'))
            $this->lang->load('strings', 'espanol');
        else
            $this->lang->load('strings', 'english');
    }

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
}
?>