<table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>User</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Admin</th>
                              <th>Subscriber</th>
                              <th>edit</th>
                              <th>delete</th>
                             
                            </tr>
                          </thead>
                        <tbody>
                        <?php
                        $query ="SELECT * FROM users" ;
                        $displayData= mysqli_query($connection, $query);

                        while ($row=mysqli_fetch_assoc($displayData)){
                          $user_id =$row['user_id'];
                          $user_password=$row['user_password'];
                          $username =$row ['username'];
                          $user_firstname =$row ['user_firstname'];
                          $user_lastname =$row ['user_lastname'];
                          $user_email =$row ['user_email'];
                          $user_role =$row ['user_role'];
                          
                          echo "<tr>";
                          echo "<td>$user_id</td>";
                          echo "<td>$username</td>";
                          echo "<td>$user_firstname</td>";

                          //Display category querry
                         // $query="SELECT * FROM posts WHERE post_id= {$post_id} ";$select_posts_id=mysqli_query($connection,$query);
                         // while($row = mysqli_fetch_assoc($select_posts_id)){
                          //  $post_title = $row['post_title'];
                           // $post_id = $row['post_id'];
                         // }
                          
                          
                          echo "<td>$user_lastname</td>";
                          echo "<td>$user_email</td>";

//$query ="SELECT * FROM posts WHERE post_id= $comment_post_id";
//$select_post_id_query =mysqli_query($connection,$query);

//while($row = mysqli_fetch_assoc($select_post_id_query)){
//$post_id = $row['post_id'];
//$post_title = $row['post_title'];

//echo "<td><a href='../post.php?p_id=$post_id'>$post_title </a></td>";

//}
                          echo "<td>$user_role</td>";
                          echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a>";
                          echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a>";
                          echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>edit</a>";
                          echo "<td><a href='users.php?delete={$user_id}'>delete</a>";
                          echo "</tr>";
                        }     
                        ?>


<?php // button for the admin
if(isset($_GET['change_to_admin'])){
  $the_user_id =$_GET['change_to_admin'];
  
  
   $query = "UPDATE users SET user_role = 'admin' WHERE user_id=$the_user_id";
   $change_to_admin_query = mysqli_query($connection,$query);
   header("Location: users.php");

  }



  // button for the subs
if(isset($_GET['change_to_sub'])){
  $the_user_id =$_GET['change_to_sub'];
  
  
   $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id=$the_user_id";
   $change_to_sub_query = mysqli_query($connection,$query);
   header("Location: users.php");
  }

  // button for delete
if(isset($_GET['delete'])){

if(isset($_SESSION['user_role'])){

if($_SESSION['user_role']=='admin'){


$user_id =mysqli_real_escape_string($connection,$_GET['delete']);


 $query = "DELETE FROM users WHERE user_id = $user_id";
 $delete_user_query = mysqli_query($connection,$query);
 header("Location: users.php");

}
}

}
?>


