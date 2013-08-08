<?php
session_start();
if(!(isset($_SESSION['user'])))
{
    header('Location: verify.php');
}
//get the user!
global $user;
$user = $_SESSION['user'];
if(isset($user))
{
    date_default_timezone_set('America/Los_Angeles');
    $timezone = date_default_timezone_get();
    $date = date('h:i:s a', time());
    $file = fopen("log.txt","a") or die("Error");
    $info = $user['name']." ".$date."\n";
    fwrite($file,$info);
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- This site was created by / belongs to Cheng Cheng.!-->
<head>
    <title>Chat</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = <?php echo "'".$user['name']."'"; ?>;
        
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
        var queries = 0;
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
              
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                          if(queries > 9)
                          {
                            window.location = "destroy.php";
                          }
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>
    <script>
    window.onfocus = function() { document.title = "Chat"}; 
     
    </script>
    
    
</head>
<body onload="setInterval('chat.update()', 1000)">
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
<br><br>

<div class = "container">

    <div id="page-wrap" align = "left">
        
            <h2>Chat
            <?php
            date_default_timezone_set('America/Los_Angeles');
            $timezone = date_default_timezone_get();
            $date = date('h:i:s a', time());
            $hour = substr($date,1,1);
            $pm = substr($date,9,9);
            
            if(($pm === "pm") && $hour > 4 && $hour < 10)
            {
                echo "<small>active</small>";
            }
            else
            {
                echo "<small>inactive</small>";
            }
            ?></h2>
            
            <p id="name-area"></p>
            
            <div id="chat-wrap"><div id="chat-area">
	    <?php

	$string = file('chat.txt');
	$size = sizeof($string);

	for($i = $size - 5 ; $i < $size ; $i++)
	{
        	echo "<p>". $string[$i]."</p>" ;
	}	
	
	?>

	    </div></div>
            <p>Your Message</p>
            <form id="send-message-area">
                <textarea id="sendie" placeholder = "Press enter to send" maxlength = '100'  ></textarea>
            </form>
    </div>
	<h3 align = "left">Instructions</h3>
<p align = "left">After you log into chat, please state what class you need help with and your Skype ID.<br>
Connect with the tutor through Skype.(They may display their ID in the chatroom or pm you in Skype)<br>
Add the person on Skype and accept their call. (You don't necessarily need a microphone or webcam to do this)
</p>

    <p><small> <b>Please close this window after you get a tutor.</b></small><br><br> <a href = "destroy.php" class = "btn btn-primary">Signout</a> </p>
<footer>
<a href = "contact.php"></a>
</footer>


</div>

</body>
</html>
