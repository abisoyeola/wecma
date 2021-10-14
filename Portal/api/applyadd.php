<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');



    include_once('../core/initialize.php');

    $apply= new Apply($db_con);
    $data = json_decode(file_get_contents("php://input"));

    $apply->firstname = $data->firstname;
    $apply->surname = $data->surname;
    $apply->phone = $data->phone;
    $apply->email = $data->email;
    $apply->gender = $data->gender;
    $apply->password = $data->password;
    $apply->othername = $data->othername;
    //$post->regno = $data->regno;

    $apply->create();
    // if($apply->create()){
    //     echo(
    //         json_encode(array('message'=>'post created'))
    //     );
    // }else{
    //     echo(
    //         json_encode(array('message'=>'post not created'))
    //     );
    // }
    

?>