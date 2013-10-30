<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CFtour extends CI_Controller{

    function __construct()
    {
          // Call the parent constructor
          parent::__construct();

          // Load model
          $this->load->model('Model');
    }

	public function tourPage(){

        $this->load->helper('functions');

        $data['tours'] = json_encode($this->Model->tourDetails());
        $data['featuredCampaigns'] = json_encode($this->Model->getFeaturedCampaign());

		$this->load->view('tours_view', $data);
	}

	public function validateFile(){

		//Background Image Check 
    	$upload_path = './images/artist/campaign';
        $config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['max_filename'] = 0;
		$config['encrypt_name'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config); 
		$this->upload->do_upload();

		$data = $this->upload->data();
		$filename = $data['file_name'];

		error_log("File name: ".$filename);

		$response['filename'] = $filename;

		$this->load->helper('functions');
		createResponse($response);
	}
	

	public function validateDetails(){
		
		$this->load->helper('functions');

		$response = $this->Model->formDetails();

      	createResponse($response);
	}

	public function campaignEditPage(){

        $tour_id = $this->uri->segment(2);

        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

        if(isset($_GET['code']))
        {
            error_log('Authentication Code exists');

            //Validate the code first
            $validCode = $this->Model->validateFBCode($_GET['code']);

            if($validCode == false)
            {
                redirect(base_url().'tours');
            }
            else
            {
                $data['getTourDetail'] = json_encode($this->Model->getTourDetail($tour_id));
                $this->load->view('campaignedit_view', $data);
            }
        }
        else if(isset($_GET['error']))
        {
            error_log('Authentication Error: '.$_GET['error']);
            redirect(base_url().'tours');
        }
        else
        {
            error_log('No Authentication done');
            redirect(base_url().'tours');
        }
	}
}
?>
