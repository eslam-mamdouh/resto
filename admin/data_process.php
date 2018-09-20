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
                $_SESSION["slide_added"] ="done";
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
                $_SESSION["slide_added"] ="done";
                header("location: specialties.php");
            }
        }

    }

?>