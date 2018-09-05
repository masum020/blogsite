<?php session_start();
    function connect_db(){
        $con = mysql_connect("localhost","root","");
        if(!$con){
            echo "Couldn't connect to the database";
        }
        $db = mysql_select_db("myblog",$con);
        if(!$db){
            echo "Couldn't select the database";
        }
    }
    function isLoggeddashboard(){
        if(!isset($_SESSION['username'])){
            header('location:blog-admin');
        }
    }
    function isLogged(){
        if(!isset($_SESSION['username'])){
            header('location:../blog-admin');
        }
    }
?>
