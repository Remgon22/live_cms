<?php include "includes/admin_header.php"?> 

    <div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                <div class="col-xs-6">
                <!-- Validation PHP -->
                <?php   addCategories(); ?>

                <form action="" method="post">
                  <div class="form-group">
                    <label for="cat_title">Add Category</label>
                  <input type="text" class="form-control"name="cat_title" >
                  </div>
                  <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
              </div>
                </form> 
<?php // UPDATE AND INCLUDE QUERY
updateInclude();?>
                    </div>
<!--Add category form-->
                <div class="col-xs-6">
                  <table class="table table-bordered table-hover"> <thead> 
                    <tr> 
                    <th>Id</th>
                    <th>category Title</th>
                </tr>
              </thead>
            <tbody>
             <?php //Find All Category
            findAllCategory();?>
             <?php // DELETE QUERY
             deleteCategory();?>
            </tbody>           
            </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
  <?php include "includes/admin_footer.php" ?>