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

            <style>
                
                body
                {
                    background-color:#F4F4EF;
                }
                .a
                {
                    margin: 0% !important;
                    width:50% ;
                    /* border-bottom: 1px solid #ddd;
                    border-left: 1px solid #ddd; */
                    border: 0.2px solid #ddd;

                    height:50px;
                    float: left;
                    background-color: #F4F4EF;
                    text-align: center;
                    padding:8px;
                    font-size: 21px;
                    text-decoration: none !important;
                    color:rgba(0, 0, 0, 0.692);
                    

                }
                h3{
                    text-align: center;
                    color:rgba(0, 0, 0, 0.692);

                }
            </style>

    <!-- <script>    
       $(document).ready(function(){
            $("up").click(function(){
               alert("Welcome.");
            });
            });
    </script> -->
    
    
</head>
<body>
    


        <div class="container col-md-12" style="width:100%;">
            
            <div class="center col-md-4" style="background-color: white; height:500px;margin-left:30%;margin-top:5%;padding:0px;border:0.5px solid #ddd">
                
                            <a id="in" href="#" class="a col-md-4" style="background-color:#fff;border:none">Sign In</a>                
                            <a id="up" href="#" class="a col-md-4">Sign up</a>    
                        
                        


                        <hr><br><br><br>

                        <form id="signin" action="process.php" method="post">
                            <h3>Sign In to your account</h3>
                            <br><br>
                                <div class="input-group col-md-10 col-md-offset-1">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control " name="email"  placeholder="Enter Your Email">
                                </div>
                                <br>
                                <div class="input-group col-md-10 col-md-offset-1" >
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="pass" type="password" class="form-control" name="password" placeholder="Enter Your password">
                                </div>     
                                <a href="forget.php">Forget Password</a>
                                <button class="btn btn-info" type="submit" name="login" style="font-size:16px; margin-left:27%;margin-top: 20px;width: 200px;padding: 10px">Sign In</button>
            
                        </form>

                        <form id="signup" style="display:none;" action="process.php" method="post" enctype="multipart/form-data">
                             <h3>Sign Up to your account</h3>
                                <div class="form-group col-md-12 ">
                                    <br>
                                    <div class="input-group"> 
                                        <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i>  </span>
                                        <input type="text" class="form-control" name="fname" placeholder="Enter Your First Name" class="fname">
                                    </div>
                                <br>
                                <div class="input-group"> 
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i>  </span>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name">
                                </div>

                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                                </div>
                                <br>
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="pass" type="password" class="form-control" name="password" placeholder="Enter Your password">
                                </div>     
                                <br>
                                <input type="file" name="image" required>
                                <br>

                                <button class="btn btn-info" name="signup" type="submit" style="font-size:16px; margin-left:27%;width: 200px;padding: 10px">Sign Up</button>
                               
                        </form>  



                            
                        

            </div>



        </div>

    <script>    


    // $(document).ready(function()
    // {
    //     $("#login").click(function(e){

    //         $.ajax({
    //             url:"process.php";
    //             type:"post";
    //             data:$("#sigin").serialize()
    //         })
    //         .done{
    //             // window.location=""
    //             echo"login successful";
    //         }
    //     });

    // });
        $(document).ready(function(){
            $("#up").click(function(){
                $("#signup").css('display','block');
                $("#signin").css('display','none');
                $("#up").css('background-color','#fff');
                $("#up").css('border','none');
                $("#in").css('background-color','#F4F4EF');
                $("#in").css('border','0.1px solid #ddd');


              });
            });

             $(document).ready(function(){
            $("#in").click(function(){
                $("#signup").css('display','none');
                $("#signin").css('display','block');
                $("#up").css('background-color','#F4F4EF');
                $("#up").css('border','none');
                $("#in").css('background-color','#fff');
                $("#in").css('border','none');


              });
            });

            // $(document).ready(function(){
            // $("#in").click(function(){
            //     $("#in").css('background-color','#000');

            //   });
            // });
    </script>
 

</body>
</html>