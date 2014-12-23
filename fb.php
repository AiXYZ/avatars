<?php 

require_once "classes/facebook.php";
$facebook = new Facebook(array(
  'appId'  => '576905229106312',
  'secret' => 'b8918b77662e8b02615f70b2ed40818d',
));


try {
  $me = $facebook->api('/me');
}
catch (FacebookApiException $e) {
  $me = NULL;
}


if (is_null($me)) {
  $auth_url = $facebook->getLoginUrl(array(
    'scope' => 'publish_stream, user_photos'
  ));

  header("Location: $auth_url");
}
else
{
    try 
    {
        $facebook->setFileUploadSupport(true);
        $response = $facebook->api
        (
            '/me/photos/',
            'post',
            array
            (
                'message' => $me['name']."'s avatar.",
                'source' => "@avatars/s_".$_GET['avatar'].".png"
            )
        );
        
    }
    catch (FacebookApiException $e) {
    error_log('Could not post image to Facebook.');
    }
    
    $Last = $facebook->api("/me?fields=albums.fields(photos)");
    header("Location: http://facebook.com/photo.php?fbid=".$Last['albums']['data']['0']['photos']['data']['0']['id']."&makeprofile=1");

}
 

?>