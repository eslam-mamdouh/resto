<?php
spl_autoload_register(function($class){
 include "classes/".$class.".php";
});
session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Frijole" rel="stylesheet">
</head>
<body>
    <p id="alert" class="alert alert-danger col-sm-offset-4" style="display:none;margin-top:50px; width:350px;">this email doesn't exist</p>
    <input style="margin-top:70px; width:350px;" class="form-control col-sm-offset-4" id="email" type="email" name="email" placeholder="Enter Your Email...">
    <br>
    <button id="forget_btn" class="col-sm-offset-5 col-sm-1 btn btn-primary">Send</button>
    <br><br><br>
    <div class="code" style="display:none">
        <input style="margin-top:10px; width:350px;" class="form-control col-sm-offset-4" id="code" type="text" name="code" placeholder="Enter Verfication Code...">
        <br>
        <button id="code_btn" class="col-sm-offset-5 col-sm-1 btn btn-primary">Confirm</button>
    </div>
    <script>
      $(document).ready(function(){
        $("#forget_btn").click(function(e){
          e.preventDefault();
          var email = $("#email").val();
          $.ajax({
            url:"process.php",
            type:"post",
            dataType:"json",
            data :{"email":email , "forget":""}
          })
          .done(function(res){
            if(res["msg"]== "error"){
                $("#alert").css("display" , "block");
            }
            if(res["msg"]== "done"){
                $(".code").fadeIn(300);
            }
            
          })
        })
      })


    </script>
</body>
</html>