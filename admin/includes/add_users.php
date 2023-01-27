<?php

 if(isset($_POST['create_user'])){
  global $connection;
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_role = $_POST['user_role'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  

  $user_password = password_hash($user_password, PASSWORD_BCRYPT,array('cost'=>12));// password hash
  
 // $post_image = $_FILES['post_image']['name'];
  //$post_image_temp = $_FILES['post_image']['tmp_name'];

  //$post_date = date('d-m-y');
  //$post_comment_count = 4;
  //move_uploaded_file($post_image_temp,"../images/$post_image");

  $query ="INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
  $query .="VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";
  $create_user_query=mysqli_query($connection,$query);

  confirmQuery($create_user_query);

echo "User Created: " . "" . "<a href='users.php'>View users</a>";

}


?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_title"> First Name</label>
<input type ="text" class="form-control" name="user_firstname">
</div>
<div class="form-group">
  <label for="post_author"> Last Name</label>
<input type ="text" class="form-control" name="user_lastname">
</div>
<div class="form-group">
  <label  for="select_role">Select Role</label>
<select class="form-control" name="user_role" id="user_role">

  <option value="admin">Admin</option>
  <option value="subscriber">subscriber</option>

</select>
</div>


<div class="form-group">
  <label for="user_title"> Username</label>
<input type ="text" class="form-control" name="username">
</div>
<div class="form-group">
  <label for="user_email"> Email</label>
<input type ="text" class="form-control" name="user_email">
</div>

<!-- <div class="form-group">
  <label for="post_image">User Image</label>
<input type ="file"  name="post_image">
</div> -->

<div class="form-group">
  <label for="user_password">Password</label>
<input type ="text" class="form-control" name="user_password">
</div>

<div class="form-group">
<input class="btn btn-primary" type="submit" name="create_user" value="Create User">
</div>
</form>