<html>
<head>
    <link rel='stylesheet' href='style/edit.css'>

	<!-- Include the JS files -->
</head>

<body>

<div id="searchbox">
    <form action="" name="findGigsForm" id="findGigsForm" method="POST" style = "display:block; height: 100%; width:100%; padding: 0px 0px;">
        <input type="text" name="search" id="search" value="<?print($searchGigs);?>"   style="height:45%; width:80%; top:0; border:0px; margin-bottom: 5px;">
        <input type="submit" value="Search"  style="width: 15%; height:45%; border: 0px; margin-left:1%; margin-bottom: 5px;"> 
        <select name="city" id="city" style = "height: 40%; width: 19%">
        <option value='all'><? echo lang('str_artist_gigs_city');?></option>
        <? 
            foreach($cityList as $city)
			{
				if(isset($sCity) && $sCity!="all" && $city==$sCity)
					print("<option value='$city' selected='selected'>$city</option>");
				else
					print("<option value='$city'>$city</option>");
			}
		?>
        </select>
        <select name="date" id="date" style = "height: 40%; width: 19%">
        <option value='all'><? echo lang('str_artist_gigs_date');?></option>
        <? 
            foreach($dateList as $date)
			{
				$formattedDate = date('d-m-Y',strtotime($date));
				if(isset($sDate) && $sDate!="all" && $date==$sDate)
					print("<option value='$date' selected='selected'>$formattedDate</option>");
				else
					print("<option value='$date'>$formattedDate</option>");
			}
		?>
        </select>
        <select name="cat" id="cat" style = "height: 40%; width: 19%">
        <option value='all'><? echo lang('str_artist_gigs_genre');?></option>
        <? 
            foreach($catList as $cat)
			{
				if(!strpos($cat,"/"))
				{
					if(isset($sCat) && $sCat!="all" & $cat==$sCat)
						print("<option value='$cat' selected='selected'>$cat</option>");
					else
						print("<option value='$cat'>$cat</option>");
				}
			}
		?>
        </select>
        <select name="budget_min" id="budget_min" style = "height: 40%; width: 20%">
        <option value='all'><? echo lang('str_artist_gigs_budget');?></option>
        <? 
            foreach($budgetList as $min)
			{	
				if($min>=0)
				{
					if(isset($sBudget) && $sBudget!="all" && $sBudget==$min)
						print("<option value='$min' selected='selected'>$min</option>");
					else
						print("<option value='$min'>$min</option>");
				}
			}
		?>
        </select>
    </form>
</div> <!--searchbox-->
<!--<div id="box" style="display:block;">

<div id="content" class="clearfix">-->
<section id="left" style = "width:100%; height:80%;">
    <div class="gcontent" >
            <div class="boxy" id="boxy" style="height: 100%;">
                <div class='gigsTableItemContainer' style="height: 100%;">
					<table style="max-height:8%; width:100%; padding:10px 10px 0px 10px; text-align:center;">
                        <tr bgcolor="#ffcc00" height="30px">
                            <td width="25%"><h1><? echo lang('str_artist_gigs_call1');?></h1></td>
                            <td width="20%"><h1><? echo lang('str_artist_gigs_call2');?></h1></td>
							<td width="20%"><h1><? echo lang('str_artist_gigs_call3');?></h1></td>
                            <td width="10%"><h1><? echo lang('str_artist_gigs_call4');?></h1></td>
                            <td width="10%"><h1><? echo lang('str_artist_gigs_call5');?></h1></td>
                            <td width="15%"><h1><? echo lang('str_artist_gigs_call6');?></h1></td>
                        </tr>
					</table>
					<div style="height:78%; width:100%; overflow-y:auto;">
                        <table width="100%" style="padding: 10px 10px; text-align: center;">
                            <?
							foreach($foundGigs as $row){
                                $gig=$row[0];
                                $link=$row[1];
                                $pid=$row[2];
                                $promoter_name=$row[3];
                                $city=$row[4];
                                $formattedDate=$row[5];
                                $time=$row[6];
                                $gigStatus=$row[7];
                            ?>
                                <tr height='20' bgcolor='#000'>
                                    <td width=25%>
                                        <?print("<a href='javascript:;' onClick=gigProfile('$link'); class='highlightRef' ><h3>$gig</h3></a>");?>
                                    </td>
        							<td width=20%>
                                        <?print("<a href='javascript:;' onClick=showProfile('$pid'); class='highlightRef'><h3>$promoter_name</h3></a>");?>
        							</td>
                                    <td width=20%><?print($city);?></td>
                                    <td width=10%><?print($formattedDate);?></td>
                                    <td width=10%><?print($time);?></td>
                                    <td width=15%>
                                        <?
                                        if($gigStatus==1)
                                            print("<a class='dibStatusRef' href='#'style='color:#666;'></a>".lang('str_artist_gigs_call7'));
                                        elseif($gigStatus==2)
                                            print("<a href='#' class='dibStatusRef redRef' style='color:#FFF;'></a>".lang('str_artist_gigs_call8'));
                                        elseif($gigStatus==4)
                                            print("<a href='#' class='dibStatusRef' style='color:#666;'></a>".lang('str_artist_gigs_call9'));
                                        elseif($gigStatus==-1)
        									print("<a class='dibStatusRef' href='#'style='color:#666;'></a>".lang('str_artist_gigs_call10'));
        								else
                                            /*<form name="dibForm" action="dib_action.php"  method="post">
                                                <input type="hidden" name="gig" value="<? print($link);?>">
                                                <input id="dibStatusButton" name="dib" type="submit" value="DIB" style="height:80%; width:auto;" onClick="return confirmSubmit()">
                                            </form>*/
                                            print("<a href='javascript:;' onClick=confirmDibsSubmit('$link'); id='dibStatusButton' style='height:80%; width:auto;'>DIB</a>");
                                        ?>
                                    </td>
                                </tr>
                            <?}?>
                        </table>
                    </div>
					?>
					<div id ="pgNoContainer" style="position:absolute; bottom: 0px; padding-left:10px; margin-bottom:5px; height: 45px; max-height:12%;">
					<?
                    if($total_pages>20){$total_pages=20;}
                    for($i=1;$i<=$total_pages;$i++){
						if($nPage == $i)
							print("<a href='javascript:;' onClick=findGigsPage(undefined,$i,undefined,undefined,undefined,undefined); style='background: #ffcc00; height: 15px; padding: 10px; float:left;' >$i</a>");
						else
							print("<a href='javascript:;' onClick=findGigsPage(undefined,$i,undefined,undefined,undefined,undefined); class='highlightRef' style='height: 15px; padding: 10px; float:left;' >$i</a>");
					}
                    ?>
					</div>
                </div> <!--gigsTableItemContainer-->
			</div> <!--boxy-->
    </div><!--gcontent-->
</section>	
</body>
</html>