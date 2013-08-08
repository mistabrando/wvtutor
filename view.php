<!DOCTYPE html>
<html lang="en">
<!-- This site was created by / belongs to Cheng Cheng.!-->
<head>
    <title>Westview Tutoring</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="jquery.js"></script>
    <script>
         var time = new Date().getTime();
         $(document.body).bind("mousemove keypress", function(e) {
             time = new Date().getTime();
         });

         function refresh() {
             if(new Date().getTime() - time >= 30000) 
                 window.location.reload(true);
             else 
                 setTimeout(refresh, 10000);
         }

         setTimeout(refresh, 10000);
    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
     <div class="navbar-inner">

        <div class="container">
          <a class="brand" href="index.php">Westview Tutoring</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="chat.php">Chat</a></li>
              <li><a href="forum.php">Forum</a></li>
              <li><a href="tutor.php">Tutors</a></li>
              
			  
		   
            </ul>
            <ul class = "nav pull-right">
              <li><a href="contact.php">Contact</a></li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>
<br><br><br>
<div class = "container">
<?php

include("gmongo.php");
$id = $_GET['id'];
global $id;
$collection = $db->posts;
$doc = $collection->findOne(array( '_id' => new MongoId($id) ));
global $doc;
echo "<p>Save this link to get back to your post later<br>";
echo "<input class = 'span10' type = 'text' value = 'wvtutor.com/view.php?id=".$id."'></input></p>";
echo "<h4>Question: </h4>".$doc['post']."<br> -".$doc['name']."<br>";

?>
<br><b>Post an Answer:</b>
<form action='commenthandler.php' method='GET' id='FORM'>  
    <?php echo "<input type = 'hidden' name = 'id' value = '".$id."'>";?>
    <input class = 'span9' type='text' name='comment' ><br>
    <?php 
    session_start();
    $_SESSION['user'] = array( 'name' => "Cheng"); //get rid of this on deploy
    $user = $_SESSION['user'];
    echo "<input type = 'hidden' name = 'name' value = '".$user['name']."'>" ?>
    <input class = 'btn btn-primary' id = 'submit' type='submit' value='Post'>  
</form>
<div id='comments'>
<?php
foreach($doc['comments'] as $comment)
{
    echo "<p>".$comment['name'].":  ".$comment['comment']."</p>";
}
?>
</div>
</div>
</body>
<html>
