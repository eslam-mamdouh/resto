<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });

    session_start();

    if(isset($_POST["add_slide"])){
        
        $slide        = new slide;
        $slide->head1 = $_POST["head1"];
        $slide->head2 = $_POST["head2"];
        $slide->head3 = $_POST["head3"];

        $path         = "../img/";
        $file         = time().$_FILES["image"]["name"];
        $full_path    = $path.$file;

        if(move_uploaded_file($_FILES["image"]["tmp_name"] , $full_path)){
            $slide->image_url = $file;
            if($slide->save()){
                // $_SESSION["slide_added"] ="done";
                header("location: slider.php");
            }
        }

    }

    if(isset($_POST["add_special"])){
        
        $slide              = new special;
        $slide->title       = $_POST["title"];
        $slide->description = $_POST["disc"];
        $slide->price       = $_POST["price"];
        
        $path               = "../img/";
        $file               = time().$_FILES["image"]["name"];
        $full_path          = $path.$file;

        if(move_uploaded_file($_FILES["image"]["tmp_name"] , $full_path)){
            $slide->image_url = $file;
            if($slide->save()){
                // $_SESSION["slide_added"] ="done";
                header("location: specialties.php");
            }
        }
        
    }

    if(isset($_POST["add_menu"])){
        
        $menu             = new menu;
        $menu->title      = $_POST["title"];
        $menu->components = $_POST["component"];
        $menu->price      = $_POST["price"];

        $path         = "../img/";
        $file         = time().$_FILES["image"]["name"];
        $full_path    = $path.$file;
        
        if(move_uploaded_file($_FILES["image"]["tmp_name"] , $full_path)){
            $menu->image_url = $file;
            if($menu->save()){
                // $_SESSION["slide_added"] ="done";
                header("location: menu.php");
            }
        }
        
    }
    if(isset($_POST["add_event"])){
        
        $event        = new event;
        $event->title = $_POST["title"];
        $event->description = $_POST["des"];
        $event->date = $_POST["date"];
        $event->status = $_POST["status"];

        $path         = "../img/";
        $file         = time().$_FILES["image"]["name"];
        $full_path    = $path.$file;
        
        if(move_uploaded_file($_FILES["image"]["tmp_name"] , $full_path)){
            $event->image_url = $file;
            if($event->save()){
                // $_SESSION["slide_added"] ="done";
                header("location: event.php");
            }
        }
        
    }


    if(isset($_GET['deleteslide']))
    {
        $slide = new slide;
        $id    =$_GET['deleteslide'];

        $sql="DELETE FROM `slider` WHERE `id`='$id'";
        $res = $slide->query($sql);

        
        if($res)
        {
            header("location:slider.php");  
        }
    }
    
    
    if(isset($_GET['deletespec']))
    {
        $special = new special;
        $id    =$_GET['deletespec'];

        $sql="DELETE FROM `specialites` WHERE `id`='$id'";
        $res = $special->query($sql);
        
        
        if($res)
        {
            header("location:specialties.php");  
        }
    }
    if(isset($_GET['deletereservation']))
    {
        $reservation = new reservation;
        $id    =$_GET['deletereservation'];

        $sql="DELETE FROM `reservations` WHERE `id`='$id'";
        $res = $reservation->query($sql);
        
        
        if($res)
        {
            header("location:reservation.php");  
        }
    }
    if(isset($_GET['deletemenu']))
    {
        $menu = new menu;
        $id    =$_GET['deletemenu'];

        $sql="DELETE FROM `menu` WHERE `id`='$id'";
        $res = $menu->query($sql);
        
        
        if($res)
        {
            header("location:menu.php");  
        }
    }

    if(isset($_GET['deleteevent']))
    {
        $event = new event;
        $id    =$_GET['deleteevent'];

        $sql="DELETE FROM `events` WHERE `id`='$id'";
        $res = $event->query($sql);
        
        
        if($res)
        {
            header("location:event.php");  
        }
    }
    
    if(isset($_GET["menu_id"])){

        $o = menu::where("id" , $_GET["menu_id"]);
        print_r(json_encode($o));

    }
    ?>