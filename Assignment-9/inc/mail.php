<?php

/********************************************************************
 In This page those operation is create-----
 1) Firstly the "function.php" page is included.
 2) A post-Request method  operation is done using super global variable "$_SERVER" and then execute the operation using an instance of "Blog" class.
 3) Then sending success or errror message. 
 
 ********************************************************************/

 include_once "./functions.php";
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS );
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
    $sub = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS );
    $message = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS );

    if (  ( new Blogs() )->sendMessage( $name, $email, $sub, $message ) ) {
        header( "location: ../contact.php?message=success" );
    } else {
        header( "location: ../contact.php?message=failed" );
    }
}
