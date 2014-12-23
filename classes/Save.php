<?php

# form inputs in the correct stacking order from bottom to top
ob_start();
error_reporting(E_ALL);

$form_fields = array('background', 'body', 'ear', 'head', 'eye', 'eyebrow', 'mouth', 'nose', 'beard', 'hair');
$_POST = array('avatar' => $_POST);

if (!isset($_POST['avatar']))
	 die;

CreateAvatar($form_fields);


function CreateAvatar($inputs)
{
    require_once('crop/WideImage.php');
    require_once('Zip.php');
    $date = date( 'U' );
    $user = $_SERVER["REMOTE_ADDR"];
    $filename = md5($date.$user);
    $CreatedAvatar = "../avatars/$filename.png";
    $CreatedSquareAvatar = "../avatars/s_$filename.png";
    $FilesToZip = array($CreatedAvatar, $CreatedSquareAvatar); 
    $ZippedFile = "../avatars/$filename.zip";

    while ($inputs)
    {      
        $file = $_POST['avatar'][array_shift($inputs)];
        $path = "../assets/parts/$file.png";
    	$layer = imagecreatefrompng($path) or die('I could not open the avatars' . $file);
    	$layerWidth = imageSX($layer);
    	$layerHeight = imageSY($layer);
    	if (!isset($slate))
    	{
    		 $slate = imagecreatetruecolor($layerWidth, $layerHeight);
    	}
    	imagecopy($slate, $layer, 0, 0, 0, 0, $layerWidth, $layerHeight);
    	imagedestroy($layer);
    }
    imagetruecolortopalette($slate, false, 256);
    imagepng($slate, $CreatedAvatar);
    imagedestroy($slate);
    WideImage::load($CreatedAvatar)->crop(3,12,150,150)->saveToFile($CreatedSquareAvatar);
    //if true, good; if false, zip creation failed
    $archive = new PclZip($ZippedFile);
    $v_list = $archive->create($FilesToZip);
    if ($v_list == 0) 
    {
        die("Error : ".$archive->errorInfo(true));
    }
    echo $filename;
}

?>