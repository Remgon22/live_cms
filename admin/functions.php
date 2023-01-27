<?php

function escape($string){
global $connection;

  mysqli_real_escape_string($connection, trim(strip_tags($string)));
}

?>

<?php // Confirm query
function confirmQuery($result){
  global $connection;

if(!$result){

  die("QUERY FAILED ." . mysqli_error($connection));
}

}
?>


<?php // Adding usercount 

function users_online(){
 
global $connection;

$session= session_id();
$time= time();
$time_out_in_seconds=30;
$time_out=$time - $time_out_in_seconds;

$query="SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($connection,$query);
$count= mysqli_num_rows($send_query);


if($count==NULL){

    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");

}else{

    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


}
$users_online_query= mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");

$count_user=mysqli_num_rows($users_online_query);
}
?>



<?php //Add category
function addCategories(){
  global $connection;
if(isset($_POST['submit'])){
  $cat_title = $_POST['cat_title'];
  if($cat_title =="" || empty($cat_title)){
   echo "This field should not be empty";
  }else {
   $query = "INSERT INTO categories(cat_title)";
   $query .="VALUE('{$cat_title}')";
   $create_category_query = mysqli_query($connection,$query);


   if(!$create_category_query){
    
     die("Query Failed" . mysqli_error($connection));
   }}}}
?>

<?php //Find All Category
function findAllCategory(){
  global $connection;
$query="SELECT * FROM categories";
$select_categories=mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_categories)){
 $cat_title = $row['cat_title'];
 $cat_id = $row['cat_id'];
 echo "<tr>";
 echo "<td>{$cat_id}</td>";
 echo "<td>{$cat_title}</td>";
 echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
 echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
 echo "<tr>";
}}
?>

<?php // DELETE QUERY
            function deleteCategory(){
              global $connection;
             if(isset($_GET['delete'])){
              $the_cat_id = $_GET['delete'];
              $query = "DELETE FROM categories ";
              $query .="WHERE cat_id = {$the_cat_id} ";
              $delete_query = mysqli_query($connection,$query);
              header("Location: categories.php");
             }
            }
             ?>

<?php //UPDATE AND INCLUE QUERY

function updateInclude(){
  global $connection;
if(isset($_GET['edit'])){
  $cat_id = $_GET['edit'];
  include "includes/update_categories.php";
}
}

function confirm($result){
  if(!$result){
    die("QUERY FAILED ." . mysqli_error($connection));

  }
}


?>