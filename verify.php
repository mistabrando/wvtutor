<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script type="text/javascript">
        var token = location.hash;
        token = token.substr(1);
        if(token.length > 1)
        {
	        window.location = "validate.php?"+token;
        }
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
<br><br><br>   
<div class = "container" align = "center">
<h2>We need to verify you're a Westview Student</h2>
<a class = "btn btn-primary" href = "https://www.facebook.com/dialog/oauth?client_id=332012720216303&redirect_uri=http://www.wvtutor.com/verify.php&scope=user_about_me,user_activities,user_education_history&response_type=token">
Verify with Facebook</a>
<br>
<h2>No Facebook Account?</h2>
<form action = 'validate.php' method = 'POST'>
	<label>First Name</label>
	<input type = 'text' name = 'firstname'/>
	<label>Last Name</label>
	<input type = 'text' name = 'lastname'/>
	<label>Last name of Principal in ALL CAPS</label>
	<input type = 'text' name = 'captcha'/><br>
	<input type = 'submit'/>
</form>
<br>
<h3 align = "left">Instructions</h3>
<p align = "left">After you log into chat, please state what class you need help with and your Skype ID.<br>
Connect with the tutor through Skype.(They may display their ID in the chatroom or pm you in Skype)<br>
Add the person on Skype and accept their call. (You don't necessarily need a microphone or webcam to do this)<br><br>
</p>
<p><h3>Don't Have Skype?</h3><a href = "http://skype.com"><img src = " http://allthingsd.com/files/2011/10/skype-icon.png"></img></a> </p>
<footer align="left" >
<a href = "contact.php"></a>
</footer>

</div>

</body>
</html>
