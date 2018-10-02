
<?php
    spl_autoload_register(function($class){
        include "../classes/".$class.".php";
    });
    include "header.php";
    session_start();

    $menus = menu::all();

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
                            <h3 class="box-title">menu Management</h3>
                            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add menu</button>
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
                                            <th>title</th>
                                            <th>component</th>
                                            <th>price</th>
                                            <th>image_url</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            foreach ($menus as $menu) {
                                            if(isset($menu))
                                            {
                                        ?>    

                                        <tr>
                                            <td class="txt-oflo"><?php echo $menu->title; ?></td>
                                            <td><?php echo $menu->component ;?></td>
                                            <td class="txt-oflo"><?php echo $menu->price ;?></td>
                                            <td><span class="text-success"><?php echo $menu->image_url;?></span></td>
                                            <td><button  data-toggle="modal" data-target="#modaledit" value="<?php echo $menu->id ;?>" class="edit btn btn-info" style="margin-left:0 !important">Edit</button></td>
                                            <td><a  href="<?php echo "data_process.php?deletemenu=".$menu->id ;?>" value="<?php echo $slide->id ;?>"  class="btn btn-danger" style="margin:0 !important">delete</a></td>
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
                                    <h4 class="modal-title">Add New Slide</h4>

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
                                        <label>component</label>
                                        <input class="form-control" name="component" placeholder="Enter component" type="text">
                                        </div>
                                        <div class="form-group">
                                        <label>price</label>
                                        <input class="form-control" name="price" placeholder="Enter price" type="text">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="exampleInputFile">Choose Image</label>
                                        <input id="exampleInputFile" name="image" type="file">

                                        </div>
                                    
                                        
                                    
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit"  name="add_menu"  class="btn btn-primary">Add</button>
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

             <!-- Modal edit-->
             <div id="modaledit" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">edit Menu</h4>

                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form role="form" action="data_process.php" method="POST" id="slide_form" enctype="multipart/form-data">
                                    <div class="box-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" placeholder="Enter title" value="" type="text">
                                        </div>
                                        <div class="form-group">
                                        <label>component</label>
                                        <input class="form-control" name="component" placeholder="Enter component" type="text">
                                        </div>
                                        <div class="form-group">
                                        <label>price</label>
                                        <input class="form-control" name="price" placeholder="Enter price"  type="text">                                       
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="exampleInputFile">Choose Image</label>
                                        <input id="exampleInputFile" name="image" type="file">

                                        </div>
                                    
                                        
                                    
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit"  name="add_menu"  class="btn btn-primary">Edit</button>
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




    <script>
      $(document).ready(function(){
          console.log("dsa");
        $(".edit").click(function(e){
            var id = e.currentTarget.value;
        
          $.ajax({
            url:"data_process.php",
            type:"get",
            dataType:"json",
            data :{"menu_id":id}
          })
          .done(function(res){
            console.log(res["title"]);
          })
        })
      })
    </script>

            <?php
                // unset($_SESSION["slide_added"]);
                // session_destroy();
               
                include "footer.php";
            ?>