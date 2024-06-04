<?php
    session_start();
    if (isset($_POST['action']) && $_POST['action'] == 'run_php_function') {
        //yourPhpFunction();
        $_SESSION['ques_no']=$_SESSION['ques_no']-1;
        echo $_SESSION['ques_no'];
    }
    
    if (isset($_POST['action']) && $_POST['action'] == 'next') {
        //yourPhpFunction();
        $_SESSION['ques_no']=$_SESSION['ques_no']+1;
        echo $_SESSION['ques_no'];
    }
?>