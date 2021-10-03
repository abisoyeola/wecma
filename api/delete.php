<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');



    include_once('../core/initialize.php');

    $post= new Post($db_con);
    $data = json_decode(file_get_contents("php://input"));

    $post->id = $data->id;

    if($post->delete()){
        echo(
            json_encode(array('message'=>'post deleted'))
        );
    }else{
        echo(
            json_encode(array('message'=>'post not found'))
        );
    }
    

?>