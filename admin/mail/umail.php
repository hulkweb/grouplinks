<?php 

function usendMail($to,$subject,$content){
    include 'ubody.php';
    $res="";
    $website="coconutpad.com";
    $website_url="coconutpad.com";
    $username=explode("@",$to)[0];


    
    $from="helpdesk@coconutpad.com";
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
    $headers .= 'From:CoconutPad Admin<'.$from.'>' ."\r\n";

    $mail=mail($to,$subject,$body,$headers);
    if($mail){
        $res="sent";
    }
    return $res;
}


?>