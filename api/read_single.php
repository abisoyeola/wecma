<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../core/initialize.php');

    $post= new Post($db_con);
    
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();
    $post->read_single(); 

    $post_arr=array(
        'id'=>$post->id,
        'firstname'=>$post->firstname,
        'lastname'=>$post->lastname,
        'username'=>$post->username,
        'email'=>$post->email,
        'role'=>$post->role,
        'created_at'=>$post->created_at,
        'status'=> $post->status==1?'Enabled':'Disabled'
    );

    print_r(json_encode($post_arr));
    
?>