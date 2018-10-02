<?php

function validate($data){//to check if empty data or not 
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
    $reservation->created_at = date("m-d-y H:i:s" ,time());    

    if(isset($_SESSION["user_id"])){

        $reservation->user_id  = $_SESSION["user_id"];   
    }   

    if($reservation->save())
    {
        print_r(json_encode(["msg"=>"done"]));
    }


}


if(isset($_POST["signup"]))
{
    $user = user::where("email" , $_POST["email"]);

    if($user){
        $_SESSION["email"]="Email already Exist";
        header("location: form.php");
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
        $user_id = $user->save();
        if($user_id)
        {
            $body = '<h2 style="background:orange;color:#FFF;padding:15px">Thanks</h2>';
            $mail = new email;
            $mail->sendMail($user->email , "Reg" , $body);
          




            $_SESSION["user_id"]=$user_id;
            header("location: index.php");
            
        }
        else{
            header("location: form.php");
            
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

    }
    else{
        $_SESSION["error"]="a";
        header("location: form.php");
        
    }

}

if(isset($_POST["forget"])){
    $email = $_POST["email"];
    $user = user::whereone("email" , $email);
    if($user){
        $code = random_int(100000 , 200000);
        $user->code = $code;
        if($user->update()){
            $mail = new email;
            $body = "hello " .$user->fname." , <br>";
            $body .= "Use below Code to reset Your Password :<br><br><br>";
            $body .= "<span style='padding:14px 17px; margin:0 auto ;background:orange;color:#FFF'>".$code."</span>";
            if($mail->sendMail($email , "Reset Password" , $body)){
                $_SESSION["forget_email"] = $email;
                print_r(json_encode(["msg"=>"done"]));
            }
        }
    }else{
        print_r(json_encode(["msg"=>"error"]));
    }
}

if(isset($_POST["code_btn"])){
    $code  = $_POST["code"];
    $email = $_SESSION["forget_email"];
    $user = user::whereone("email" , $email);
    if($user){
        if($user->code == $code){
            print_r(json_encode(["msg"=>"matched"]));
        }else{
            print_r(json_encode(["msg"=>"not"]));
        }
    }

}

