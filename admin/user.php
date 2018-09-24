
<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });
    include "header.php";
    session_start();

    $users = user::all();

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
                            <h3 class="box-title">users Management</h3>
                            <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Slide</button> -->
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
                                            <th>fname</th>
                                            <th>lname</th>
                                            <th>email</th>
                                            <th>pass</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($users as $user) {
                                            if(isset($user))
                                            {
                                        ?>    

                                        <tr>
                                            <td class="txt-oflo"><?php echo $user->fname; ?></td>
                                            <td><?php echo $user->lname ;?></td>
                                            <td class="txt-oflo"><?php echo $user->email ;?></td>
                                            <td class="txt-oflo"><?php echo $user->password ;?></td>
                                            <td><span class="text-success"><?php echo $user->image_url;?></span></td>
                                            <td><button value="<?php echo $user->id ;?>" class="btn btn-success" style="margin-left:0 !important">Edit</button></td>
                                            <td><a href="<?php echo "data_process.php?deleteuser=".$user->id ;?>" value="<?php echo $slide->id ;?>"  class="btn btn-danger" style="margin:0 !important">delete</a></td>
                                        </tr>
                                        <?php }} ?>
                                        
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
                                    <h4 class="modal-title">Add New Slide</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                    <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label>Head 1</label>
                                <input class="form-control" name="head1" placeholder="Enter Head 1" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 2</label>
                                <input class="form-control" name="head2" placeholder="Enter Head 2" type="text">
                                </div>
                                <div class="form-group">
                                <label>Head 3</label>
                                <input class="form-control" name="head3" placeholder="Enter Head 3" type="text">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Choose Image</label>
                                <input id="exampleInputFile" name="image" type="file">

                                </div>
                            
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  name="add_slide"  class="btn btn-primary">Add</button>
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