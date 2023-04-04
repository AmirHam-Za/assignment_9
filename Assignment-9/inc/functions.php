<?php

/********************************************************************
 In this page those operation is create-----
 1) in a construct method database connecton is created the database is name is assigned as "blogs_assignment_9"
 2) a table named "post" is selected by SELECT query
 3) Then select certain post data by catagory
 4)lastly an INSERT query is applied in  "message table"
 ********************************************************************/

class Blogs {
    private $conn;
    public function __construct() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "blogs_assignment_9";
        $this->conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
        if ( !$this->conn ) {
            die( "Database connection error" );
        }
    }
    public function getAllPosts() {
        $query = "SELECT * FROM posts";
        if ( mysqli_query( $this->conn, $query ) ) {
            return mysqli_query( $this->conn, $query );
        }
    }
    public function getPostByKeyword( $keyword ) {
        $query = "SELECT * FROM posts WHERE title LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%'";
        if ( mysqli_query( $this->conn, $query ) ) {
            return mysqli_query( $this->conn, $query );
        }
    }
    public function getPostById( $id ) {
        $query = "SELECT * FROM posts WHERE id='$id'";
        if ( mysqli_query( $this->conn, $query ) ) {
            return mysqli_query( $this->conn, $query );
        }
    }
    public function getPostByCategory( $categoryName ) {
        $query = "SELECT * FROM posts WHERE category='$categoryName'";
        if ( mysqli_query( $this->conn, $query ) ) {
            return mysqli_query( $this->conn, $query );
        }
    }
    public function getAllCategory() {
        $query = "SELECT DISTINCT category FROM posts";
        if ( mysqli_query( $this->conn, $query ) ) {
            return mysqli_query( $this->conn, $query );
        }
    }
    public function sendMessage( $name, $email, $sub, $message ) {
        $query = "INSERT INTO `messages` (`name`, `email`, `sub`, `message`) VALUES ('$name', '$email', '$sub', '$message')";
        if ( mysqli_query( $this->conn, $query ) ) {
            return true;
        }
        return false;
    }
}
