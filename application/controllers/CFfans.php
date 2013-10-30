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

		error_log("Camp Id: ".$campaign_id);

    if(isset($_GET['code']))
    {
      $data['fbEvent'] = json_encode($this->Model->joinFBEvent($_GET['code'],$campaign_id));
    }

    $data['campaign'] = json_encode($this->Model->campaignDetails($campaign_id));
		$this->load->view('campaign_view', $data);
	}

	public function campaignEvent(){

		require_once('/src/facebook.php');

  		$config = array(
    				'appId' => '248776888603319',
    				'secret' => '50f31c2706d846826bead008392e8969',
  		);

  		$facebook = new Facebook($config);
  		$user_id = $facebook->getUser();

      $data['user_id'] = $user_id;
      $data['facebook'] = $facebook;
      $data['event_id'] = 0;

      $this->load->view('campaignevent_view', $data);     
	}

	public function postLink(){

		require_once('/src/facebook.php');

  		$config = array(
    				'appId' => '248776888603319',
    				'secret' => '50f31c2706d846826bead008392e8969',
  		);

  		$facebook = new Facebook($config);
  		$user_id = $facebook->getUser();

  		$data['user_id'] = $user_id;
  		$data['facebook'] = $facebook;

		  $this->load->view('postlink_view', $data);
	}
}
