<?php
        include("gmongo.php");
        $collection = $db->posts;
        $cursor = $collection->find();
        $cursor->sort(array('_id' => -1));
        foreach($cursor as $doc)
        {
            print_r($doc);
        }
?>
