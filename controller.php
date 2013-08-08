<?php
include_once("gmongo.php");
//GET USER
$name = $_POST['name'];
$collection = $db->posts;  
$post = htmlspecialchars($_POST['post']);
    if(strlen($post) > 0)
    {  
	   $emptyarray = array();
	    $insert = array(
		    'post' => $post,
		    'name' => $name,
		    'comments' => $emptyarray
	    );
	    $collection->insert($insert);
    }

?>  
