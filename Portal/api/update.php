<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');



    include_once('../core/initialize.php');

    $post= new Post($db_con);
    $data = json_decode(file_get_contents("php://input"));

    $post->firstname = $data->firstname;
    $post->lastname = $data->lastname;
    $post->email = $data->email;
    $post->username = $data->username;
    $post->password = $data->password;
    $post->role = $data->role;
    $post->id = $data->id;

    if($post->update()){
        echo(
            json_encode(array('message'=>'post update'))
        );
    }else{
        echo(
            json_encode(array('message'=>'post update'))
        );
    }
    

?>