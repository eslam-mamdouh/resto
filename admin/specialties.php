
<?php
spl_autoload_register(function($class){
    include "../classes/".$class.".php";
});
include "header.php";
session_start();

$specialties = special::all();

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
                        <li class="active">Blank Page</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Specialties Management</h3>
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Slide</button>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image Url</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($specialties as $special) {
                                        ?>    
                                        
                                        <tr>
                                            <td class="txt-oflo"><?php echo $special->title; ?></td>
                                            <td><?php echo $special->description ;?></td>
                                            <td class="txt-oflo"><?php echo $special->price ;?></td>
                                            <td><span class="text-success"><?php echo $special->image_url;?></span></td>
                                            <td><button value="<?php echo $special->id ;?>" class="btn btn-success" style="margin-left:0 !important">Edit</button></td>
                                            <td><button value="<?php echo $special->id ;?>" class="btn btn-danger" style="margin:0 !important">delete</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> <a href="#">Check all the sales</a> </div>
                        
                        </div>


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Special</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                            <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Enter Title" type="text">
                                </div>
                                <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="disc" placeholder="Enter Discription" type="text">
                                </div>
                                <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Enter Price" type="text">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Choose Image</label>
                                <input id="exampleInputFile" name="image" type="file">

                                </div>
                            
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  name="add_special"  class="btn btn-primary">Add</button>
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
        </div>



        <?php
           
            
            include "footer.php";
        ?>