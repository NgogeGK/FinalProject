<?php
class mail_this extends CI_Model{

	function mail_this(){
		parent::__construct();
                
                
                
                
                
	}
	
	//insert data to the db 
	function send($subject, $message ,$to, $name='User', $from =null, $from_name  ){
		$from = 'jkusda@adhrc.co.ke';
                
              //  var_dump($to);
              echo $message;
                
                if(is_array($to)){
                    
                    
                    
                    for($r=0; $r<count($to);$r++){
                        
                        
                 $to_send[]=  array(
                'email' => $to[$r],
                'name' => $name,
                'type' => 'to'
            );
                        
                        
                      
                        
                    }
                    
                    
                    
                    
                }else{
                    
                    
                    $to_send  = array(
            array(
                'email' => $to,
                'name' => $name,
                'type' => 'to'
            ));
                    
                    
                }
                
                
               // echo json_encode($to_send);
                

$finale_template =  $this->mail_template($name, $subject, $message);


$this->mandrill_send($finale_template,$subject, $to_send);



 

		}
	
	function mail_template($name, $subject, $message){
		$messageee ='
		
<style>  
.header_top{ background-color:#37a5ff; color:#FFF; font-size:24px; padding:10px 10px 10px 10px; margin:0px; }
.subject{ background-color:#E5E5E5; color:#000; font-size:18px; padding:5px 10px 5px 10px;    }
.message{ padding:10px; font-size:14px;  }

.footaer{ font-size:14px; padding:10px;  background-color:#37a5ff; color:#FFF; text-align:center; }
</style>
 

<table width="100%" style=" font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif; padding:0px;margin:0px;">
<tr><td> <div class="header_top" style="background-color:#1691BF; color:#FFF; font-size:24px; padding:10px 10px 10px 10px; margin:0px;" > Sendy  </div> </td></tr>
<tr><td>
<div class="subject" style="background-color:#ffffff; color:#000; font-size:14px; padding:5px 10px 5px 10px;" > '.$subject.' </div>
 
 <div class="message" style="padding:10px; font-size:13px; ">
 
<p> '.$message.' </p>
 </div> </td></tr>
<tr><td> <div class="footaer" style="font-size:14px; padding:10px;  background-color:#1691BF; color:#FFF; text-align:center;"  > <a style="color:#ffffff;" href="http://www.sendy.co.ke">www.sendy.co.ke</a>  &copy; '.date('Y').' Sendy  </div> </td></tr>

</table>
 ';
return $messageee;
		
		}	
		
		
function new_template($name, $subject, $message){
	
	
	
	
	
	
	$msg = '<span class="preheader" style="font-size:1px;"></span>
<table width="100%" border="0" cellspacing="0" cellpadding="20" style="background-color:#FFF;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<tbody>
<tr>
<td align="center">
<img style="padding:30px 0 0px;" src="https://sendyit.com/style/img/Sendy_logo_refined.png" alt="Sendy Logo" height="76"><br>
<br>
<table style="font-size:14px;" cellspacing="0" cellpadding="0" border="0" width="600">
<tbody>
<tr>
<td align="left" style="background-color:#FFF;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;line-height:22px;padding:0px 25px 25px 25px;">
<table cellpadding="0" cellspacing="0" border="0" style="padding-bottom:30px;" width="100%">
<tbody>
<tr>
<td valign="top">
 




'.$message.'


 </td>
</tr>
</tbody>
</table>
</td>

</tr>
</tbody>
</table>
<br>
<table border="0" cellpadding="0" cellspacing="0" width="600" style="font-size:13px;">
<tbody>
<tr>
<td align="center">
&nbsp;
<a href="https://www.facebook.com/pages/SENDY/843869815628934?fref=ts"> <img src="https://test.sendyit.com/blog_img/fb_email.png" alt="Facebook"></a>
&nbsp;
<a href="https://twitter.com/sendymobile"> 
<img src="https://test.sendyit.com/blog_img/twitter_email.png" alt="Twitter"></a>
&nbsp;
<a href="https://www.linkedin.com/company/sendy-limited"> <img src="https://test.sendyit.com/blog_img/linkedin_email.png" alt="Linkedin"></a>
&nbsp; <br>
&copy; '.date("Y").'&nbsp;
<a href="https://sendyit.com/" style="text-decoration:none;  "><strong>Sendy Ltd</strong></a>.3rd Floor Suite 5. Greenhouse Ngong road. Nairobi<br>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>';
	
	
	return $msg;
	
	}		
		
		
	
	
	
	
	
function mandrill_send($messagfe,$subject, $to){
    
    
   // require_once '/var/www/html/biz/style/mandrill-api-php/src/Mandrill.php';
    
    require_once (APPPATH.'src/Mandrill.php');
   
               $mandrill = new Mandrill('v8VDBUMz5Bbb8o_53BOHgw'); 
    
    

    
   
               try {
   
    $message = array(
        'html' => $messagfe,
        'text' => $messagfe,
        'subject' => $subject,
        'from_email' => 'jkusda@adhrc.co.ke',
        'from_name' => 'JKUSDA CHURCH',
        'to' =>$to
        
        
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = date('Y-m-d');
    

    $result = $mandrill->messages->send($message, $async, $ip_pool);
   // echo json_encode($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
   // echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    //throw $e;
}
    
    
}	
	
	
	
	
	
	
}
?>