<?php

function validate($data){
    $error=[];
    foreach($data as $k => $v){
        if(empty($data[$k])){
            $error[]=$k;
        }

    }
    return $error;
}


spl_autoload_register(function($class)
{
    include "classes/".$class.".php";
});

    session_start();
if(isset($_POST["submit"]))
{

    $err = validate($_POST);
    if($err){
        print_r(json_encode($err));
        die();
    }


    $reservation = new reservation;

    $reservation->people_num = $_POST["people"];
    $reservation->date       = $_POST["date"];
    $reservation->time       = $_POST["time"];
    $reservation->user_name  = $_POST["name"];
    $reservation->email      = $_POST["email"];
    $reservation->phone      = $_POST["phone"];
    if(isset($_SESSION["user_id"])){

        $reservation->user_id  = $_SESSION["user_id"];   
    }   
    $reservation->created_at = date("m-d-y H:i:s" ,time());    

    if($reservation->save())
    {
        echo "done";
    }


}


if(isset($_POST["signup"]))
{
    $user = user::where("email" , $_POST["email"]);
    if($user){
        header("location: form.php");
        $_SESSION["email"]="Email already Exist";
        exit();
    }



    $user = new user;
    $user->fname=$_POST['fname'];
    $user->lname=$_POST['lname'];
    $user->email=$_POST['email'];
    $user->password=$_POST['password'];
    $user->role= "client";

    $path="img/";
    $file=$_FILES['image']['name'];
    $full_url=$path.$file;

    if(move_uploaded_file($_FILES['image']['tmp_name'],$full_url))
    {
        $user->image_url=$full_url;

        if($user->save())
        {
            $_SESSION['signup']="done";
            header("location: index.php");
            
        }
    }

}

if(isset($_POST['login']))
{
    
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    

    
    $user = new user;
    $sql  = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass' ";
    $user  = $user->one($sql);
    if($user){

        $_SESSION["user_id"]=$user->id;
        header("location: index.php");

    }else{
        $_SESSION["error"]="a";
        header("location: form.php");
        
    }

 
}

