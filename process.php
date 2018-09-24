<?php
spl_autoload_register(function($class)
{
    include "classes/".$class.".php";
});

    session_start();


if(isset($_POST["submit"]))
{
    $reservation = new reservation;

    $reservation->people_nums=$_POST["people"];
    $reservation->date  =$_POST["date"];
    $reservation->time  =$_POST["time"];
    $reservation->user_name  =$_POST["name"];
    $reservation->email =$_POST["email"];
    $reservation->phone =$_POST["phone"];   
    $reservation->created_at=date("l jS \of F Y h:i:s A");    

    if($reservation->save())
    {
        $_SESSION["serv_added"]="done";
        header("location:index.php");
        // echo"your date entered";
    }


}


if(isset($_POST["signup"]))
{
    $user = new user;

    $user->fname=$_POST['fname'];
    $user->lname=$_POST['lname'];
    $user->email=$_POST['email'];
    $user->password=$_POST['password'];

    $path="img/";
    $file=$_FILES['image']['name'];
    $full_url=$path.$file;

    if(move_uploaded_file($_FILES['image']['tmp_name'],$full_url))
    {
        $user->image_url=$full_url;

        if($user->save())
        {
            $_SESSION['signup']="done";
            // header("locaion:")
            // echo"done";
        }
    }

}

if(isset($_POST['login']))
{
    $user = new user;

    $email=$_POST['email'];
    $pass=$_POST['password'];



    $sql="SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass' ";
    $res = $user->query($sql);
    
    if($res)
    {
        echo"login success";
    //   header("location:index.php");
    }
}

