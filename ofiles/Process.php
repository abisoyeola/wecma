<?php
class Process
{
	public $link;
	private $user;
	private $pass;
	private $host;
	private $db;

//server=drixeltechnology.com.ng;database=drixelte_isfop;user=drixelte_isfop;password=isfop2020database
	public function __construct($user = "wectang_mili", $pass = "wectang_wecta123456", $host = "wecta.ng")
	{
		$this->user = $user;
		$this->pass = $pass;
		$this->host = $host;

		$this->link = mysqli_connect($host, $user, $pass);
		
		$this->createDb('wectang_wecta');
		$this->createTable();
		return ($this->link);
	}

	private function createDb($dbname)
	{
		$sql = mysqli_query($this->link, "CREATE DATABASE IF NOT EXISTS $dbname");
		$this->link = mysqli_connect($this->host, $this->user, $this->pass, $dbname);
	}

	public 	function createTable($sql = "")
	{
		if ($sql === "")
			mysqli_query($this->link, "CREATE TABLE IF NOT EXISTS account(id int Auto_Increment Primary Key Not Null, email text not null, password text not null, acctypeid text not null, dateCreated datetime default current_timestamp, status boolean )");
		else {
			mysqli_query($this->link, $sql);
		}
	}

	public function insertRecord($sql)
	{
		//insert record into database
		mysqli_query($this->link, $sql);
		if (mysqli_affected_rows($this->link) > 0) {
			$res = array('message' => 'Record created successfully...');
			return (json_encode($res));
		} else {
			$res = array('message' => mysqli_error($this->link));
			return (json_encode($res));
		}
	}



	function loadPrivilege()
	{
		//getRecord

		$get = "SELECT * FROM privilegetype  WHERE privilege = 'Account' OR privilege = 'Sales' OR privilege = 'Super User'";
		$getRec = mysqli_query($this->link, $get);

		if (mysqli_fetch_array($getRec) > 0) {
			return (0);
		} else {

			$sql = "INSERT INTO privilegetype values(1,'Account',CURRENT_TIMESTAMP),(2,'Sales',CURRENT_TIMESTAMP),(3,'Super User',CURRENT_TIMESTAMP),(4,'General Admin',CURRENT_TIMESTAMP)";


			mysqli_query($this->link, $sql);
			if (mysqli_affected_rows($this->link)) {
				$res = array('message' => 'Record created successfully...');
				return (json_encode($res));
			} else {
				$res = array('message' => 'Error creating record...');
				return (json_encode($res));
			}
		}
	}


	function loadAccountType()
	{
		//getRecord

		$get = "SELECT * FROM accounttype  WHERE accounttype = 'Admin' OR accounttype = 'Agent' OR accounttype = 'User'";
		$getRec = mysqli_query($this->link, $get);

		if (mysqli_fetch_array($getRec) > 0) {
			return (0);
		} else {

			$sql = "INSERT INTO accounttype values(1,'Admin',CURRENT_TIMESTAMP),(2,'Laund Agent',CURRENT_TIMESTAMP),(3,'Delivery Agent',CURRENT_TIMESTAMP), (4,'User',CURRENT_TIMESTAMP)";

			mysqli_query($this->link, $sql);
			if (mysqli_affected_rows($this->link)) {
				$res = array('message' => 'Record created successfully...');
				return (json_encode($res));
			} else {
				$res = array('message' => 'Error creating record...');
				return (json_encode($res));
			}
		}
	}


	function loginMail($username, $password)
	{
		//Encrypted password with sha512
		$encPassword = hash("sha512", $password);
		$sql = "SELECT * FROM account WHERE email = '$username' AND password = '$encPassword' AND status = 1";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		$user = mysqli_fetch_array($isUser);
		if ( $user["acctypeid"]!="") {
			//encode json records to an array
			$res = array("acctypeid" => $user["acctypeid"],"email"=>"$username","id"=>$user["id"]);
			return (json_encode($res));
		} else {
			$res = array("acctypeid" => "");
			return (json_encode($res));
		}
	}

	function loginUser($username, $password)
	{
		//Encrypted password with sha512
		$encPassword = hash("sha512", $password);
		$sql = "SELECT * FROM agent WHERE username = '$username' AND password = '$encPassword'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		$user = mysqli_fetch_array($isUser);
		if ( $user["id"]!="") {
			//encode json records to an array
			$res = array("ref" => $user["refferal"],"upline"=>$user["upline"],"email"=>$user["username"],"name"=>$user["firstname"],"stage"=>$user["stage"],"id"=>$user["id"]);
			return (json_encode($res));
		} else {
			$res = array("id" => "");
			return (json_encode($res));
		}
	}

	
	function verifyUser($username)
	{
		
		$sql = "SELECT * FROM account WHERE email = '$username'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("email" => "$username");
			return (json_encode($res));
		} else {
			$res = array("email" => "");
			return (json_encode($res));
		}
	}
	function agentUser($username)
	{
		
		$sql = "SELECT * FROM agent WHERE username = '$username'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("email" => "$username");
			return (json_encode($res));
		} else {
			$res = array("email" => "");
			return (json_encode($res));
		}
	}
	function pinExist($pin)
	{
		
		$sql = "SELECT * FROM epin WHERE pin = '$pin' AND status = 'free'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("pin" => "$pin");
			return (json_encode($res));
		} else {
			$res = array("pin" => "");
			return (json_encode($res));
		}
	}
	function verifyRef($rf)
	{
		
		$sql = "SELECT * FROM agent WHERE refferal = '$rf'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("rf" => "$rf");
			return (json_encode($res));
		} else {
			$res = array("rf" => "");
			return (json_encode($res));
		}
	}
	
    function verifyUserBankInfoById($id)
	{
		
		$sql = "SELECT * FROM bank WHERE userid = '$id'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("id" => "$id");
			return (json_encode($res));
		} else {
			$res = array("id" => "");
			return (json_encode($res));
		}
	}
	
	function verifyUserContactInfoById($id)
	{
		
		$sql = "SELECT * FROM contact WHERE userid = '$id'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("id" => "$id");
			return (json_encode($res));
		} else {
			$res = array("id" => "");
			return (json_encode($res));
		}
	}
	function getServiceInfoById($id,$item,$table)
	{
		
		$sql = "SELECT * FROM $table WHERE accountid = '$id' AND item = '$item'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		if (mysqli_fetch_array($isUser) > 0) {
			//encode json records to an array
			$res = array("id" => "$id");
			return (json_encode($res));
		} else {
			$res = array("id" => "");
			return (json_encode($res));
		}
	}
	
	function getUserId($username)
	{
	
		$sql = "SELECT id FROM account WHERE email = '$username'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		//Checking if the account is available
		$id = mysqli_fetch_array($isUser);
		if ($id) {
			//encode json records to an array
			$res = array("email" => "$id[0]");
			return (json_encode($res));
		} else {
			$res = array("email" => "none");
			return (json_encode($res));
		}
	}
	
	
	function getProfile($username)
	{

		$sql = "SELECT * FROM account INNER JOIN profile ON account.id = profile.account_id WHERE email = '$username'";

		//Getting data from database, and save it to isUser variable
		$isUser = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
		$data = mysqli_fetch_array($isUser);
		//Checking if the account is available
		return(json_encode($data));
	}
	
	function getAccountTypes(){
		//get account information
		$data = mysqli_query($this->link, "SELECT * FROM accounttype");
		//$rows = mysqli_fetch_array($data);
		$info = array();
		while($rows = mysqli_fetch_array($data)){
			$info[$rows[0]] = $rows[1];
		}
		return(json_encode($info));
	}
	
	function getAdminInfo($sql){
		$data = mysqli_query($this->link, $sql);
		//array to hold data
		$count = 1;
		$info = array();
		while($row = mysqli_fetch_array($data)){
			$info[$count][0] = $row[0];
			$info[$count][1] = $row[1] ." ".$row[2];			
			$info[$count][2] = $row[3];
			$info[$count][3] = $row[4];
			$count++;
		}
		return(json_encode($info));
	}
	function getSingleData($sql){
		$data = mysqli_query($this->link, $sql);
				
		$row = mysqli_fetch_array($data);
			
		return(json_encode($row));
	}
	
	function getMultiData($sql){
		$data = mysqli_query($this->link, $sql);
		
		$counts = 1;
		$rec = array();
		$rec["data"]= array();
		while($row = mysqli_fetch_array($data)){
			//$rec[$counts] = $row;
			//$counts++;
			array_push($rec["data"], $row);
		}
			
		//return(json_encode($rec));
		return(json_encode($rec["data"]));
	}
	
	
	function disable($id){
		$acc = mysqli_query($this->link,"UPDATE account SET status = 0 WHERE id  =$id");//operational variable and action
		if(mysqli_affected_rows($this->link)){
			return(json_encode('Account disabled! '));
		}
	}
	
	function enable($id){
		$acc = mysqli_query($this->link,"UPDATE account SET status = 1 WHERE id  =$id");//operational variable and action
		if(mysqli_affected_rows($this->link)){
			return(json_encode('Account disabled! '));
		}
	}
    
    function defaultLogin()
	{
		//getRecord

		$get = "SELECT * FROM account  WHERE email = 'admin@wecta.ng'";
		$getRec = mysqli_query($this->link, $get);

		if (mysqli_fetch_array($getRec) > 0) {
			return (0);
		} else {

			$sql = "INSERT INTO account(email, password, acctypeid,status) values('admin@wecta.ng','".sha1('admin2020!@$')/*hash("sha512", 'admin2020!@$')*/."',1,1)";

			mysqli_query($this->link, $sql);
			$sql = "INSERT INTO profile(firstname, lastname, pics,account_id) values('Admin','Admin','userpics/download.png
', 1)";

			mysqli_query($this->link, $sql);
			if (mysqli_affected_rows($this->link)) {
				$res = array('message' => 'Record created successfully...');
				return (json_encode($res));
			} else {
				$res = array('message' => 'Error creating record...');
				return (json_encode($res));
			}
		}
	}
    
    function getBankList(){
        $banks = array(
        array( 'id' => '1', 'name' => 'Access Bank', 'code' => '044' ),
        array( 'id' => '2', 'name' => 'Citibank', 'code' => '023' ),
        array( 'id' => '3', 'name' => 'Diamond Bank', 'code' => '063' ),
        array( 'id' => '4', 'name' => 'Dynamic Standard Bank', 'code' => '' ),
        array( 'id' => '5', 'name' => 'Ecobank Nigeria', 'code' => '050' ),
        array( 'id' => '6', 'name' => 'Fidelity Bank Nigeria', 'code' => '070' ),
        array( 'id' => '7', 'name' => 'First Bank of Nigeria', 'code' => '011' ),
        array( 'id' => '8', 'name' => 'First City Monument Bank', 'code' => '214' ),
        array( 'id' => '9', 'name' => 'Guaranty Trust Bank', 'code' => '058' ),
        array( 'id' => '10', 'name' => 'Heritage Bank Plc', 'code' => '030' ),
        array( 'id' => '11', 'name' => 'Jaiz Bank', 'code' => '301' ),
        array( 'id' => '12', 'name' => 'Keystone Bank Limited', 'code' => '082' ),
        array( 'id' => '13', 'name' => 'Providus Bank Plc', 'code' => '101' ),
        array( 'id' => '14', 'name' => 'Polaris Bank', 'code' => '076' ),
        array( 'id' => '15', 'name' => 'Stanbic IBTC Bank Nigeria Limited', 'code' => '221' ),
        array( 'id' => '16', 'name' => 'Standard Chartered Bank', 'code' => '068' ),
        array( 'id' => '17', 'name' => 'Sterling Bank', 'code' => '232' ),
        array( 'id' => '18', 'name' => 'Suntrust Bank Nigeria Limited', 'code' => '100' ),
        array( 'id' => '19', 'name' => 'Union Bank of Nigeria', 'code' => '032' ),
        array( 'id' => '20', 'name' => 'United Bank for Africa', 'code' => '033' ),
        array( 'id' => '21', 'name' => 'Unity Bank Plc', 'code' => '215' ),
        array( 'id' => '22', 'name' => 'Wema Bank', 'code' => '035' ),
        array( 'id' => '23', 'name' => 'Zenith Bank', 'code' => '057' ));

        return(json_encode($banks));

    }
	
	public function getUnreadMessages($tablename){
		$get = "SELECT COUNT(status) as unread FROM {$tablename}  WHERE status = 0";
		$getRec = mysqli_query($this->link, $get);
		$msg = mysqli_fetch_array($getRec);
		if ($msg) {
			return(json_encode($msg));
		} 
	}
	
	public function rateStore($agentid,$userid,$des,$rate){
		$get = "SELECT * from rate  WHERE agentid = '{$agentid}' AND userid ='{$userid}'";
		$getRec = mysqli_query($this->link, $get);
		$msg = mysqli_fetch_array($getRec);
		if ($msg) {
			return(json_encode(array("message"=>"Already rated thanks")));
		} else{
			$sql = "INSERT INTO rate(agentId,description,userid,rate)VALUES('$agentid','$des','$userid','$rate')";
			$msg = $this->insertRecord($sl);
			return($msg);
		}
	}
	
	public function popularStore($agentid,$userid,$des,$rate){
		$sql = "SELECT agentId, avg(rate) FROM `rate` GROUP BY agentId";
		$data = $this->getMultiData($sql);
		return($data);
	}
    public function getStore(){
		$sql = "SELECT * from contact";
		$data = $this->getMultiData($sql);
		return $data;
	}
    public function getIndividualStore($id){
		$sql = "SELECT * from contact WHERE userid = $id";
		$data = $this->getMultiData($sql);
		return $data;
	}
    public function getStoreServices($id){
		$sql = "SELECT * from servicesitem WHERE accountid=$id";
		$data = $this->getMultiData($sql);
		return $data;
	}
}
