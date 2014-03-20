<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Radioone extends MY_Controller{

	public function episode(){

		$data['urlyear'] = $this->uri->segment(3);
		$data['urlmonth'] = $this->uri->segment(4);
		$data['urlday'] = $this->uri->segment(5);

		$sessionArray = $this->session->all_userdata();

		if (!isset($sessionArray['session_id'])) {
			session_start();
		}

		if($data['urlyear'] && $data['urlmonth'] && $data['urlday'])
			$SQLs = "SELECT * FROM `".DATABASE."`.`radioone` WHERE streamdate = '".$data['urlyear']."-".$data['urlmonth']."-".$data['urlday']."'";
		else
			$SQLs = "SELECT * FROM `".DATABASE."`.`radioone` ORDER BY streamdate desc";
		$results = mysql_query($SQLs);
		
		if($a = mysql_fetch_assoc($results))
		{
			$data['name'] = $a['name'];
			$data['image'] = $a['image'];
		}
		else //No results found, pick the latest upload
		{
			$SQLs = "SELECT * FROM `".DATABASE."`.`radioone` ORDER BY streamdate desc";
			$results = mysql_query($SQLs);

			if($a = mysql_fetch_assoc($results))
			{
				$data['name'] = $a['name'];
				$data['image'] = $a['image'];
			}
		}

		$this->load->view('radioone_view', $data);

	}

	public function loadTiles() {

		//Need to check for text undefined since it seems javascript is sending the string rather than an actual undefined variable
		if(isset($_POST["day"]) && $_POST["day"] != 'undefined')
		{
			$thisDate = $_POST["day"];
		}

		if(isset($_POST["month"]) && isset($_POST["year"]) && $_POST["month"] != 'undefined' && $_POST["year"] != 'undefined')
		{
			$thisMonth = $_POST["month"];
			$thisYear = $_POST["year"];
		}
		else
		{
			$thisMonth = date("m");
			$thisYear = date("Y");
		}

		$SQLs = "SELECT * FROM `".DATABASE."`.`radioone` WHERE YEAR(streamdate) = '".$thisYear."' AND MONTH(streamdate) = '".$thisMonth."'";
		if(isset($thisDate))
		 	$SQLs = $SQLs."AND DAY(streamdate) = '".$thisDate."'";

		$results = mysql_query($SQLs);
		if(mysql_num_rows($results) > 0)
		{
			while ($a = mysql_fetch_assoc($results))
			{
				$epName = $a["name"]; $epImage = $a["image"]; $epAudio = $a["audiolink"]; $epDate = date('jS M, Y',strtotime($a["streamdate"])); $epDesc = $a["desc"];

				$streamRow = array($epName, $epImage, $epAudio, $epDate, $epDesc);
				$response['streams'][] = $streamRow;
			}
		}

		$response['thisYear']  = $thisYear;
		$response['thisMonth'] = $thisMonth;
		if(isset($thisDate))
			$response['thisDate']   = $thisDate;
		$response['numTiles'] = mysql_num_rows($results);

        //Load View and trim all the endlines
		$viewHTMLCode = trim(preg_replace('/\s\s+/', ' ', $this->load->view('include/videoTiles', $response, true)));

		$this->load->helper('functions');
		createHTMLResponse($viewHTMLCode);
	}
}
?>