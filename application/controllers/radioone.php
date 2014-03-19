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

		if(isset($_POST["day"]))
		{
			$thisDate = $_POST["day"];
		}

		if(isset($_POST["month"]) && isset($_POST["year"]))
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

		$response['year']  = $thisYear;
		$response['month'] = $thisMonth;
		if(isset($thisDate))
			$response['day']   = $thisDate;
		$response['numTiles'] = mysql_num_rows($results);
                $response['langStrings'] =  array(
                                                'btn_month_jan' => $this->lang->line('btn_month_jan'),
                                                'btn_month_feb' => $this->lang->line('btn_month_feb'),
                                                'btn_month_mar' => $this->lang->line('btn_month_mar'),
                                                'btn_month_apr' => $this->lang->line('btn_month_apr'),
                                                'btn_month_may' => $this->lang->line('btn_month_may'),
                                                'btn_month_jun' => $this->lang->line('btn_month_jun'),
                                                'btn_month_jul' => $this->lang->line('btn_month_jul'),
                                                'btn_month_aug' => $this->lang->line('btn_month_aug'),
                                                'btn_month_sep' => $this->lang->line('btn_month_sep'),
                                                'btn_month_oct' => $this->lang->line('btn_month_oct'),
                                                'btn_month_nov' => $this->lang->line('btn_month_nov'),
                                                'btn_month_dec' => $this->lang->line('btn_month_dec')
                                        );

		$this->load->helper('functions');
		createResponse($response);
	}
}
?>