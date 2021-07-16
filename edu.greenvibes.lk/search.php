<?php
 	$server = "localhost";
	$user = "root";
    $pass = "";
    $dbname = "blog";
    $connection = mysqli_connect($server, $user, $pass, $dbname);
    $table = "blog";
	$keyword=  $_GET['s'];
	echo $keyword;
	$query = "SELECT * FROM eblog where blog_id = {$keyword} LIMIT 1";
	$result_set = mysqli_query($connection, $query);
    //checking id the query is successful
    if ($result_set){
      if ( mysqli_num_rows($result_set) == 1){
        // prepare to display the record
        $blog_post = mysqli_fetch_assoc($result_set);
        $blog_title = stripcslashes($blog_post['blog_title']);
        $blog_date = stripcslashes($blog_post['blog_date']);
        $blog_text = stripcslashes($blog_post['blog_text']);
        $blog_img = $blog_post['blog_img'];
        $created_by = $blog_post['created_by'];
      }
    }
 ?>
 <div class="newsblog">
        <h1><?php echo $blog_title; ?></h1>
        <p class="newsdate">DATE POSTED :<?php echo $blog_date ?></p><br>
        <?php echo '<img src="img/'.$blog_img.'" alt="">'?>
        <?php echo $blog_text; ?> <br>
        <h5>Published by :  <?php echo $created_by; ?></h5>
</div>