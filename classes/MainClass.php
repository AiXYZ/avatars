<?php

/**
 * @copyright widimedia
 *
 * @author Enes Kul
 */

require_once 'facebook.php';
 
class MainClass
{
    public function GetPartNames()
    {
        $names = array('head', 'hair', 'ear', 'beard', 'eyebrow', 'eye', 'nose', 'mouth');
        return $names;
    }
    
    public function GetPreviews($category)
    {
        $directories = glob("assets/preview/$category/*");
        $directory = array();
        foreach($directories as $directories)
        {
            $directory[] = str_replace("assets/preview/$category/", "", $directories);   
        }
        return $directory;      
    }
}

?>
