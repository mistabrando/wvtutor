<?php
        include("gmongo.php");
        $collection = $db->posts;
        $cursor = $collection->find();
        $cursor->sort(array('_id' => -1));
        $true = false;
        $count = 0;
        foreach($cursor as $doc)
        {
            if($true)
            {
                echo "<hr style='border: none;height: 1px; color: 008B8B; background: black;'/>";
                
            }    
            echo "<h5>".$doc['name'].": "."&nbsp;&nbsp;".$doc['post']."</h5>";
            echo "<a href = 'view.php?id=".$doc['_id']."'>View this thread</a><br>";
            $true = true;
            $count++;
            if($count > 10)
            {
                break;
            }   
        }
        echo "<br>".
        "<h4><a href = 'viewall.php'>Didn't Save your link and want to view all posts? Click here. 
        </a></h4>";
        
 
?>

