<!DOCTYPE html>
<html lang="en">
<head>
    <title>Westview Tutoring</title>
    <link href="bootstrap.css" rel="stylesheet">
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
        $collection = $db->posts;
        $cursor = $collection->find();
        $cursor->sort(array('_id' => -1));
        $true = false;
        foreach($cursor as $doc)
        {
            if($true)
            {
                echo "<hr style='border: none; height: 1px; color: 080808; background: grey;'/>";
                
            }    
            echo "<h5>".$doc['post']."</h5>";
            echo "<a href = 'view.php?id=".$doc['_id']."'>View this thread</a><br>";
            $true = true;
            echo "<br><br>";
          
        }
?>
</div>
</body>
</html>
