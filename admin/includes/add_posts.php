<?php


 if(isset($_POST['create_post'])){
  global $connection;
  $post_title = $_POST['title'];
  $post_category_id = $_POST['post_category'];
  $post_author = $_POST['author'];
  $post_status = $_POST['post_status'];
 
  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];

  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  //$post_comment_count = 4;
  move_uploaded_file($post_image_temp,"../images/$post_image");

  $query ="INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_staus) ";

  $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}',
  '{$post_tags}','{$post_status}') ";

  $create_post_query=mysqli_query($connection,$query);

  confirmQuery($create_post_query);


  $the_post_id = mysqli_insert_id($connection);

  echo "<p class='bg-success'>Post created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> Or <a href='posts.php'>Edit More Post </a></p>";




}

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_title"> Post Title</label>
<input type ="text" class="form-control" name="title">
</div>

<div class="form-group">
<label for="post_category">Category</label>
<select name="post_category" id="post_category">

<?php

$query="SELECT * FROM categories";
$select_categories=mysqli_query($connection,$query);

confirmQuery($select_categories);

while($row = mysqli_fetch_assoc($select_categories)){
 $cat_title = $row['cat_title'];
 $cat_id = $row['cat_id'];

 
echo "<option value='{$cat_id}'>{$cat_title}</option>";

}

?>


</select>
</div>
<div class="form-group">
<label for="users">users</label>
<select name="users" id="post_category">

<?php

$query="SELECT * FROM users";
$select_categories=mysqli_query($connection,$query);

confirmQuery($select_categories);

while($row = mysqli_fetch_assoc($select_categories)){
 $user_id = $row['user_id'];
 $username = $row['username'];

 
echo "<option value='{$user_id}'>{$username}</option>";

}

?>


</select>
</div>


<!--<div class="form-group">
  <label for="post_author"> Post Author</label>
<input type ="text" class="form-control" name="author">
</div>!-->



<div class="form-group">
<select name="post_status" id="">
<option value="draft">Post Status</option>
<option value="published">published</option>
<option value="draft">draft</option>
</select>
</div>
<div class="form-group">
  <label for="post_image">Post Image</label>
<input type ="file"  name="post_image">
</div>
<div class="form-group">
  <label for="post_tags"> Post Tags</label>
<input type ="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
  <label for="summernote"> Post Content</label>
<textarea type ="text" class="form-control" name="post_content" id="summernote" cols="30" row="10">
</textarea>
</div> 
<div class="form-group">
<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
</div>
</form>