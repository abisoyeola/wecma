<?php
	//include('Auth.php');
	
	require_once('admission/auth/Auth.php');
	
	$sql = "SELECT * FROM basicdata INNER JOIN biodata ON biodata.regno =  basicdata.regno INNER JOIN admission ON admission.regno = basicdata.regno INNER JOIN documents ON documents.regno = basicdata.regno WHERE admission.status = 1 AND admission.regno='".$_GET['id']."'";
	@$stdata = json_decode($pr->getMultidata($sql));
	
	 $sqlCo = "SELECT * FROM Department WHERE Id = " . $stdata[0]->course  ;
    $dep =json_decode($pr->getMultiData($sqlCo));
    
	
    
    //$sql = "SELECT * FROM AdmissionDetails LEFT JOIN PersonalInformation ON AdmissionDetails.PersonalIdId = PersonalInformation.Id LEFT JOIN ContactInformation ON AdmissionDetails.PersonalIdId = ContactInformation.PersonalId WHERE AdmissionDetails.id=".$_GET['id']." ORDER BY status " ;
    //$datum = json_decode($pr->getMultiData($sql));
    
    // $course = json_decode($pr->getMultiData("SELECT * FROM Department WHERE Id =". $datum[0]->course));
    // $Fac = json_decode($pr->getMultiData("SELECT * FROM Faculty WHERE Id =". $course[0]->FacultyId));
?>
<div style="line-height: 1.3;"> 
<img src="formit/images/logo.png" width="150px"><br>
<p align='right'>Date: <?php echo(date('M d, Y'));?></p>
<h3>NAME:<?php echo(strtoupper($stdata[0]->surname ." ".$stdata[0]->firstname));  ?></h3>
<h3>COURSE: <?php echo($dep[0]->DepartmentList);?></h3> 

<h3>MODE OF ENTRY: <?php echo(strtoupper("FRESH (Full Time)")); ?></h3>
 
<center><p><h3>OFFER OF PROVISIONAL ADMISSION TO MARINE PROGRAMME</h3></p></center>
<p>Sequel to your application into this Academy, I am delighted to inform you that you have been<br> 
offered admission as indicated above.<br>
<p>However, the admission is made subject to the following conditions;<br>
<ol type="a">
    <li>You possess a minimum of 5 ‘O’ level credit passes including English, Mathematics and three other relevant credits in your course of study.</li>
    <li>Your particulars provided in your application forms are correct in every respect.</li>
    <li>You are to present original credentials listed in the application for scrutiny during registration. If discovered at any point in time that you do not possess any of the qualifications which you claim to have obtained and presented or any information you provided are false, your admission would be withdrawn with immediate effect.</li>
    <li>You are to present a letter of identification from a reputable person who can testify to your good character.</li>
    <li>Intending cadet has proven to be medically fit for all field training (evidence of medical fitness report from general hospital is required)</li>
    <li>No alteration, change of name and etc. would be allowed after the registration.</li>
    <li>You should be at least 16 years old as time of admission (evidence of date of birth will be required)</li>
    <li>This offer is non- transferrable to any other person.</li>
    <li>Registration and payment has to be completed 2 weeks from receipt of this letter.
Please accept my congratulations.</li>
   
</ol>

</p>
Yours Faithfully<br>

<img src="formit/images/sign.jpeg" width="200px"><br>

Ogunyemi Omobolanle<br>
Director, Admissions<br>


</p>
<hr width='100%'>
<p style="text-align: center">
    
    Whispering palms, iworo-Ajido Epeme road, off Aradagun, Badagry Lagos. <br>
    Website:https://www.wecta.ng &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email:admission@wecta.ng<br>
    Telephone:+2347044433346
<br>
<a href="" onclick="window.print()">Print Now</a> 
</p>
</div>
