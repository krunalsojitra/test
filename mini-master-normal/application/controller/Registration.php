<?php
header('Content-Type: application/json; charset=utf-8');
include_once('MCrypt.Class.php');
class Registration extends Controller
{
   

     /**
     * @Action:	Add new user
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add new user in user table
     */
     /*
  		{
	    "data": {
	        "user_email": "krunal@gmail.com",
	        "user_pass": "admin",
	        "user_phone": "9999999",
	        "first_name":"test",
	        "last_name":"shah",
	        "device_id":"bjj34jhksd", 
	        "device_type":"1"
		    }
		 }
	   */
    public function addUser()
    {
    	 	$input = file_get_contents('php://input');
			
			// check MCrypt
			if(isset($input) && $input != ""){	
				$mcrypt = new MCrypt();
				
				$input = json_decode($mcrypt->decrypt(trim($input)), TRUE);
			}
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['first_name']) && !empty($input['data']['first_name']) 
    		 && isset($input['data']['last_name']) && !empty($input['data']['last_name']) 
    		 && isset($input['data']['user_email']) && !empty($input['data']['user_email']) 
    		 && isset($input['data']['user_pass']) && !empty($input['data']['user_pass']) 
    		 && isset($input['data']['user_phone']) && !empty($input['data']['user_phone'])
			 && isset($input['data']['device_id']) && !empty($input['data']['device_id'])
			 && isset($input['data']['device_type']) && !empty($input['data']['device_type']))
					{
						
						 $firstname = $input['data']['first_name'];
						 $lastname = $input['data']['last_name'];
						 $email = $input['data']['user_email'];
						 $userpass = $input['data']['user_pass'];
						 $userphone = $input['data']['user_phone'];
						 $deviceid = $input['data']['device_id'];
						 $devicetype = $input['data']['device_type'];
						 $activation_code = md5(rand(8842, 100000));
						 
						$model = $this->loadModel('CRegistration');
						$result = $model->addRegUser($firstname, $lastname, $email, $userpass, $userphone, $deviceid, $devicetype, $activation_code);
					
						if($result == 1)
						{
								$message = "<span style='font-size:14px; font-family: calibri;'>
										<b>Dear ".ucwords($firstname).",<br /><br />Thank you for connecting your account with Card App!</b><br /><br />
										But before we can activate your account, one last step must be taken to complete your registration process.<br />
										Please note, you must complete this last step to become a registered member. You will only need to visit activation URL once to activate your account.
										<br> To complete your registration, please visit below URL:<br />
										<a href='".URL."Verification/account/".$activation_code."'>".URL."Verification/account/".$activation_code ."</a><br /><br />
										<b>With Best Regards,<br />
										 Card App</b></span>";
							$to = $email;
							$subject = " CardApp - Account Activation ";
							$separator = md5(time());
							$eol = PHP_EOL;
							$from = 'krunal.letsnurture@gmail.com';
							
							$headers = "From: Card App<".$from.">".$eol;
							$headers .= "Reply-To: ".$from."\r\n";
							$headers .= "MIME-Version: 1.0".$eol;
							$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
							$headers .= "Content-Transfer-Encoding: 7bit".$eol;
							$headers .= ".".$eol.$eol;
							// message
							$headers .= "--".$separator.$eol;
							$headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
							$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
							$headers .= $message.$eol.$eol;
							$status = mail($to, $subject, "", $headers);
							
							if($status){
								$response['status'] = "1";
								$response['data']['success'] = "Account activation mail sent on registered email.";
								echo json_encode($response);
								exit();
							}else{
								$response['status'] = "0";
								$response['data']['error'] = "Failed to send account confirmation mail. Please try later.";
								echo json_encode($response);
								exit();
							}
						}else
						{
							$response['status'] = "0";
							$response['data']['error'] = "Email id already register";
							echo json_encode($response);
							exit();
						}
						   
					}else{
						  
						if(!isset($input['data']))
						{
							$response['status'] = "0";
							$response['data']['error'] = "Please pass request input";
							echo json_encode($response);
							exit();
						} 
						if(empty($input['data']))
						{
							$response['status'] = "0";
							$response['data']['error'] = "Request input can't be empty";
							echo json_encode($response);
							exit();
						} 
						if(isset($input['data']['first_name']) && empty($input['data']['first_name'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass first name";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['last_name']) && empty($input['data']['last_name'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass last name";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['user_email']) && empty($input['data']['user_email'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['user_pass']) && empty($input['data']['user_pass'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass password";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['user_phone']) && empty($input['data']['user_phone'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass phone number";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['device_id']) && empty($input['data']['device_id'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass device id";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['device_type']) && empty($input['data']['device_type'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass device type";
							echo json_encode($response);
							exit();
						}		
	
	
					}		  
      }
	
	

    

}
