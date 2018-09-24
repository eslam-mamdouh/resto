
<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });
    include "header.php";
    session_start();

    $events = event::all();

?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blank Page </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Specialties</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Events Management</h3>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add event</button>
                            <br>
                            <br>
                            <?php
                                // if(isset($_SESSION["slide_added"])){
                                //     echo "<div class='alert alert-success'>Slide Added Successfuly!</div>";
                                // }
                            ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>date</th>
                                            <th>description</th>
                                            <th>image</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($events as $event) {
                                            if(isset($event))
                                            {
                                        ?>    

                                        <tr>
                                            <td class="txt-oflo"><?php echo $event->title; ?></td>
                                            <td><?php echo $event->date ;?></td>
                                            <td class="txt-oflo"><?php echo $event->description ;?></td>
                                            <td><span class="text-success"><?php echo $event->image_url;?></span></td>
                                            <td><span class="text-success"><?php echo $event->status;?></span></td>
                                            <td><button value="<?php ?>" class="btn btn-success" style="margin-left:0 !important">Edit</button></td>
                                            <td><a href="<?php echo "data_process.php?deleteevent=".$event->id ;?>"  class="btn btn-danger" style="margin:0 !important">delete</a></td>
                                        </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table> <a href="#"></a> </div>
                        
                        </div>


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New event</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                            <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Enter title" type="text">
                                </div>
                                <div class="form-group">
                                <label>Date</label>
                                <input class="form-control" name="date" placeholder="Enter date" type="date">
                                </div>
                                <div class="form-group">
                                <label>description</label>
                                <input class="form-control" name="des" placeholder="Enter description" type="text">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Choose Image</label>
                                <input id="exampleInputFile" name="image" type="file">
                                <div class="form-group">
                                <label>status</label>
                                <input class="form-control" name="status" placeholder="Enter status" type="text">
                                </div>
                                </div>
                            
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  name="add_event"  class="btn btn-primary">Add</button>
                            </div>
                            </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>


                    </div>
                </div>
            </div>



            <?php
                // unset($_SESSION["slide_added"]);
                // session_destroy();
                include "footer.php";
            ?>