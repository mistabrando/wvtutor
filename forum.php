<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forums</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">  
          $(document).ready(function(){
	        
	        //Get comments
	        
	        $.get('spitter.php', function(data) {
                $('#comments').append(data);
                });
	        
		    //Submit Handler
            $("#FORM").submit(function(e) {  
                
                // stop form from submitting normally   
                e.preventDefault();   
                $('#submit').attr('disabled', 'disabled');
               $.post('controller.php',
                $('#FORM').serialize(),  
               function() {
				      
				      $("#status").show();
                      $("#status").html("<p><font color = '#308014'>Submitted Successfully!</font></p>");
				      $("#status").hide(2000);
				     
                  });
                  
                $('input:text').val('');  
                //FANCY FANCY
			    setTimeout(function() {
			      $('#submit').removeAttr('disabled');
			    },1850);
                
                //get some new stuff
                $.get('spitter.php', function(data) {
                $('#comments').html(data);
                });
              
              });  
          });  
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
<p>Give feedback on forums at <b>wv.tutor@gmail.com</b><p>
<h2>Forums <small>beta</small></h2>
<p>Post your questions here.</p>
<!-- FORM !-->
    <div id = 'loader'></div>
    <div id = "status"></div>
<?php
    session_start();
    $_SESSION['user'] = array( 'name' => "Cheng"); //get rid of this on deploy
    $user = $_SESSION['user'];
    if(!(isset($_SESSION['user'])))
    {
        echo "
        
        <div id = 'subby'>
		<form action='/' method='post' id='FORM'>  
		  <input class = 'span10' type='text' name='post' disabled><br>  
		  <input class = 'btn btn-primary' id = 'submit' type='submit' value='Post' disabled>  
		    </form>
	    </div>
	    <a href = 'verify.php'>You need to connect with facebook to submit a post. (Hit this link, 
	    verify and comeback to the forums)</a><br><br>
	    <div id='status'></div>
        
        ";
    }
    else
    {
        //global $user;
        //$user = $_SESSION['user'];
        //dun forget about shit up here
         echo "
        
        <div id = 'subby'>
		<form action='death' method='post' id='FORM'>  
		  <input type = 'hidden' value = ".$user['name']." name = 'name'>
		  <input class = 'span10' type='text' name='post'><br>  
		  <input class = 'btn  btn-primary' id = 'submit' type='submit' value='Post'>  
		    </form>
	    </div>
	    <div id='status'></div>
        
        ";
    }
 
?>
<div id ="comments"></div>
</div>

</body>

</html>

