<?php
ob_start();
session_start();

require_once('Process.php');
$pr = new Process();

$addDetails = "CREATE TABLE IF NOT EXISTS AdmissionDetails(id int primary key Auto_increment not null,course text not null,level text not null,PersonalIdId text not null,eng text not null,math text not null,c1 text not null,c2 text not null,c3 text not null,olevel1 text , olevel2 text, bcert text, pics text , transferdoc text,agent text ,status bool,datecreated datetime default current_timestamp)";


$pr->createTable($addDetails);

$summer = "CREATE TABLE IF NOT EXISTS summerclass(id int primary key Auto_increment not null,level text not null,dept text not null,link text not null, datecreated datetime default current_timestamp)";

$pr->createTable($summer);

/**
		PRELOADING PRIVILEGE TYPE WITH DEFAULT INFORMATIONS
 */

//$pr->loadPrivilege();
$pr->defaultLogin();

?>