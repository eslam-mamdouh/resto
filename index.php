<?php
   spl_autoload_register(function($class){
    include "classes/".$class.".php";
});

  
  session_start();

  if(isset($_SESSION['signup']) && $_SESSION['signup']=="done" ){
    $user = user::where("id" , $_SESSION["user_id"]);
  }
  if(isset($_SESSION["user_id"])){
    $user = user::whereone("id" , $_SESSION["user_id"]);
  }

 

  if(isset($_GET["logout"])){
    unset($_SESSION["user_id"]);
  }

  
  
  $slides      = slide::all();
  $specialties = special::all();
  $menus       = menu::all();  
  $events      = event::all();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resto &mdash; </title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  <style>
    .user-info{
      position :fixed;
      width:100%;
      padding:15px;
      background :#FFF;
    }

    .navbar-collapse{
      float:left !important;
      margin-left:100px !important;
    }
    .right-side{
      float:right;
      margin-top:0px !important;
      position: absolute;
      right: 10px;
      top: 40px;
      color:#000 !important;
    }
    .new{
      top:25px !important;
    }
    .right-side a{
      margin-right:10px;
      color: #FFF !important ;
      font-weight:bold;
    }
    .right-side a:last-child{
      font-weight: 200;
      background: #FFA33E;
      padding: 7px;
      border-radius: 5px;
    }
    .logout{
      border:none;
      border-radius:5px;
      padding:5px;
      }
  
  </style>
  </head>
  <body>
    
    <!-- Fixed navbar -->

    
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" title="uiCookies:FineOak">FineOak</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" data-nav-section="welcome">Welcome</a></li>
            <li><a href="#" data-nav-section="specialties">Specialties</a></li>
            <li><a href="#" data-nav-section="menu">Menu</a></li>
            <li><a href="#" id="re" data-nav-section="reservation">Reservation</a></li>
            <li><a href="#" data-nav-section="events">Events</a></li>
            <li><a href="#" data-nav-section="contact">Contact</a></li>
            <li><a href="#" data-nav-section="contact"></a></li>
            <li><a href="#" data-nav-section="contact"></a></li>
            <!-- <li><a href="form.php"  data-nav-section="resigster">signin</a></li> -->
          </ul>
        </div>
      </div>
          <div class="right-side pull-right">
          <?php
                  if(isset($_SESSION["user_id"])){
              ?>
                <a href="#"><?php echo $user->fname ." ".$user->lname; ?></a>
                <a href="index.php?logout" id="logout" class="logout danger btn-danger">Logout</a>
                <?php 
                  if($user->role == "admin"){
                  ?>
                    <a href="admin/index.php" style="pointer-events:all !important"> Dashboard </a>
                  <?php }?>
                  <?php }else{?>
                    <a href="form.php">resigtertion </a>
                  <?php } ?>

            

          </div>
    </nav>

    <section class="flexslider" data-section="welcome">
      <ul class="slides">
        <?php
          foreach ($slides as $slide) {
        ?>
        <li style="background-image: url(<?php echo "img/" .$slide->image_url; ?>)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading"><?php echo $slide->head1; ?></h1>
                  <h3 class="secondary-heading"><?php echo $slide->head2; ?></h3>
                  <p class="sub-heading"><?php echo $slide->head3; ?></p>
                </div>
              </div>
            </div>
          </div>
        </li>
          <?php } ?>
      </ul>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Discover</h1>
              <h3 class="secondary-heading">Our Store</h3>
              <span class="seperator">* * *</span>
            </div>
            <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
            <p><a href="#" class="probootstrap-custom-link">About Us</a></p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <p><img src="img/img_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_2.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discover</h2>
              <h3 class="secondary-heading">Our Specialties</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- probootstrap-bg-white -->
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="probootstrap-cell-retro">


            <?php
              foreach ($specialties as $special) {
            ?>
              <div class="half">
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(<?php echo "img/". $special->image_url; ?>);"></div>
                <div class="text text-center">
                  <h3><?php echo $special->title; ?></h3>
                  <p><?php echo $special->description; ?></p>
                  <p class="price"><?php echo $special->price; ?></p>
                </div>
              </div>
            </div>
              
              <?php } ?>
              

          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_4.jpg);"  data-stellar-background-ratio="0.5"  data-section="menu">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discover</h2>
              <h3 class="secondary-heading">Our Menu</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
              <?php
                foreach ($menus as $menu) {             
              ?>
          <div class="col-md-6">
            <ul class="menus">
              <li>
                <figure style="width:120px" class="image"><img src="<?php echo"img/".$menu->image_url;?>" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <span class="price"><?php echo"$menu->price";?></span>
                  <h3><?php echo"$menu->title";?></h3>
                  <p><?php echo"$menu->component";?></p>
                </div>
              </li>
            </ul>
          </div>
            <?php } ?>
        </div>
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_5.jpg);"  data-stellar-background-ratio="0.5" data-section="reservation">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Booking</h2>
              <h3 class="secondary-heading">Reserve A Table</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
      
        
          <p id="res_create" class="alert alert-success" style="text-align: center; display:none">your reservation is created</p>
     
        <div class="row">
        <br><br>
        <div class="col-md-12 probootstrap-animate">
            <form id="reservation" class="probootstrap-form">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="people">How Many People</label>
                    <div class="form-field">
                      <i class="icon icon-chevron-down"></i>
                      <select type="int" name="people" id="people" class="form-control" required>
                        <option value="1">1 people</option>
                        <option value="2">2 people</option>
                        <option value="3">3 people</option>
                        <option value="4">4+ people</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <div class="form-field">
                      <i class="icon icon-calendar"></i>
                      <input type="date" name="date" class="form-control" required>
                    </div>
                    <label id="date" style="color:red;display:none">date field is required.</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="time">Time</label>
                    <div class="form-field">
                      <i class="icon icon-clock"></i>
                      <input type="text" id="time" name="time" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END row -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <div class="form-field">
                      <i class="icon icon-user2"></i>
                      <input type="text" name="name" class="form-control" placeholder="Your full name" required>
                    </div>
                    <label id="name" style="color:red;display:none">name field is required.</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <div class="form-field">
                      <i class="icon icon-mail"></i>
                      <input type="text" id="email" name="email" class="form-control" placeholder="Your email address" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <div class="form-field">
                      <i class="icon icon-phone"></i>
                      <input type="text" id="phone" name="phone" class="form-control" placeholder="Your phone" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <input name="submit" id="submit" value="Submit" class="btn btn-lg btn-primary btn-">
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_4.jpg);"  data-stellar-background-ratio="0.5" data-section="events">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Upcoming</h2>
              <h3 class="secondary-heading">Our Events</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
        <?php foreach ($events as $event){
          # code...
        ?>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="<?php echo "img/".$event->image_url;?>" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date"><?php echo $event->date;  ?></span>
                <h3><a href="#"><?php echo $event->title;  ?></a></h3>
                <p><?php echo $event->description;  ?></p>
                <p class=""><a href="#" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>
        <?php } ?>
        
         
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Contact</h1>
              <h3 class="secondary-heading">Let's Chat</h3>
            </div>
            <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="post" class="probootstrap-form">
              <div class="form-group">
                <label for="c_name">Your Name</label>
                <div class="form-field">
                  <input type="text" id="c_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="c_email">Your Email</label>
                <div class="form-field">
                  <input type="text" id="c_email" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="c_message">Your Message</label>
                <div class="form-field">
                  <textarea name="c_message" id="c_message" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="c_submit" id="c_submit" value="Send Message" class="btn btn-primary btn-lg">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Locations</h3>
              <div class="row">
                <div class="col-md-6">
                  <p> 198 West 21th Street, Suite 721 <br> New York NY 10016</p>
                </div>
                <div class="col-md-6">
                  <p> 198 West 21th Street, Suite 721 <br> New York NY 10016</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Open Hours</h3>
              <div class="row">
                <div class="col-md-4">
                  <p>Monday - Thursday <br> 5:30pm - 10:00pm</p>
                </div>
                <div class="col-md-4">
                  <p>Friday - Sunday <br> 5:30pm - 10:00pm</p>
                </div>
                <div class="col-md-4">
                  <p>Available for Catering <br> Email or Call Us</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p class="copyright-text">&copy; 2017 <a href="https://uicookies.com/">uiCookies:Resto</a>. All Rights Reserved. Images by <a href="https://graphicburger.com/">GraphicBurger</a> &amp; <a href="https://unsplash.com/">Unsplash</a></p>
          </div>
          <div class="col-md-4">
            <ul class="probootstrap-footer-social right">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

    <script>
      $(document).ready(function(){
        $("#submit").click(function(e){
          e.preventDefault();
          $.ajax({
            url:"process.php",
            type:"post",
            dataType:"json",
            data :$("#reservation").serialize()
          })
          .done(function(res){
             
            if(res["msg"] == "done"){
              $("#res_create").css("display" , "block");
            }else{
                for(var i=0 ; i< Object.keys(res).length;i++){
                  console.log(res);
                  $("#"+res[i]).css("display" , "block");
                }
            }
          })
        })
      })


    </script>

  </body>
</html>