<?php 
    session_start();
    $_SESSION['paid'] = 'paid';
    header("Location: https://www.wecta.ng/formit");
?>