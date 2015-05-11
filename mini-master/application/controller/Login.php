<?php
header('Content-Type: application/json; charset=utf-8');
include_once('MCrypt.Class.php');
class Login extends Controller
{
   

    /**
     * @Action:	Login
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Login
     */
     // http://localhost/mini-master/Login/UserLogin
     // 5eafc76f0ba602f09e6018b21a42ce01a41b93c25b9464752072fa1bfd782d83de31b1cc0bc6484f6772defedf43d95bfbaa53a3f584ac1a892ad07e07e5565d4542fd048ffa68abd693c0c4069f5ffa40b93eefb2ce6fd4295c195b917c701af30e3fa3ee8d5372ae9aff5fd7b468f5f1155ff72a576a1ec2326e4db683688345b4cbf250e1665200541b4414194c9fa633f771e3f013ea25c237be29bfe09eb5fb637a23949d670dc20c0d863dfe1bb62eb9f3cf07a181f0b8a5df4a044957a77edcec796c304de5971b8dc32644e1
	 // {"data":{"user_email":"nilesh@gmail.com", "user_pass":"admin", "device_id":"123", "device_type":"2"}}
	 //{"status":"1","data":{"user_id":"38","firstname":"test","lastname":"shah","user_phone":"9999999","email":"nilesh@gmail.com"}}
	
    public function userLogin()
    {		$input = json_decode(file_get_contents('php://input'),TRUE);
    
 	   	 	// $input = file_get_contents('php://input');
			// if(isset($input) && $input != ""){	
				// $mcrypt = new MCrypt();
// 				
				// $input = json_decode($mcrypt->decrypt(trim($input)), TRUE);
// 				
			// }
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_email']) && !empty($input['data']['user_email']) 
    		 && isset($input['data']['user_pass']) && !empty($input['data']['user_pass'])
			 && isset($input['data']['device_id']) && !empty($input['data']['device_id'])
			 && isset($input['data']['device_type']) && !empty($input['data']['device_type']))
					{
						
						
						 $email = $input['data']['user_email'];
						 $userpass = $input['data']['user_pass'];
						 $deviceid = $input['data']['device_id'];
						 $devicetype = $input['data']['device_type'];
						
						
						$model = $this->loadModel('CLogin');
						$result = $model->checkLogin($email, $userpass, $deviceid, $devicetype);
						
						if(isset($result) && $result == '3'){
							$response['status'] = "0";
							$response['data']['error'] = "Your account is not active";
							echo json_encode($response);
							exit();
						}else{
							if(isset($result) && !empty($result))
							{
								$data['user_id'] = $result->id;
								$data['firstname'] = $result->firstname;
								$data['lastname'] = $result->lastname;
								$data['user_phone'] = $result->user_phone;
								$data['email'] = $result->email;
								
								
								$response['status'] = "1";
								$response['data'] = $data;
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Invalid email or password";
								echo json_encode($response);
								exit();
							}
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
						if(isset($input['data']['user_email']) && empty($input['data']['user_email'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['user_pass']) && empty($input['data']['user_pass'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass password";
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
	
	

    /**
     * @Action:	forget password
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: forget password
     */
     //http://localhost/mini-master/Login/forgotPass
     //{"data":{"user_email":"nilesh@gmail.com"}}
    public function forgotPass()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
			 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_email']) && !empty($input['data']['user_email']) 
    		 )
					{
						$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$rand_pass_normal = substr(str_shuffle($chars),0,8);
					 	$rand_pass = md5($rand_pass_normal);
    					
						
						$email = $input['data']['user_email'];
						
						$model = $this->loadModel('CLogin');
						$result = $model->reqforgotpass($email, $rand_pass);
						
							if($result == 1)
							{
								$message = "<span style='font-size:14px; font-family: calibri;'>
									<b>Dear User</b>,<br /><br />
									We received your request to recover your account.
									Please find below your account's new password:
									<br />
									<p style='font-size:15px;'>".$rand_pass_normal."</p><br><br><br>
									<b>With Best Regards,<br />
									 Card App/b></span>";
								$to = $email;
								$subject = " CardApp - Account's New Password ";
								$separator = md5(time());
								$eol = PHP_EOL;
								$from = 'krunal.letsnurture@gmail.com';
								
								$headers = "From: Card App <".$from.">".$eol;
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
									$response['message'] = "New password sent on your registered email.";
									$response['data']['unique_code'] = $rand_pass_normal;
									echo json_encode($response);
									exit();
								}else{
									$response['status'] = "0";
									$response['data']['error'] = "Failed to process your request. Please try after some time.";
									echo json_encode($response);
									exit();
								}
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Invalid email";
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
						if(isset($input['data']['user_email']) && empty($input['data']['user_email'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}	
	
	
					}		  
      }
	
	/**
     * @Action:	forget password after Add new password
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: forget password after Add new password
     */
     //http://localhost/mini-master/Login/forgotPass
     //{"data":{"user_email":"nilesh@gmail.com", "new_password":"xyz"}}
    public function addNewpassword()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
			 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_email']) && !empty($input['data']['user_email']) 
    		 && isset($input['data']['new_password']) && !empty($input['data']['new_password']))
					{
						$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
						$rand_pass_normal = substr(str_shuffle($chars),0,8);
					 	//$rand_pass = md5($rand_pass_normal);
    					
						
						$email = $input['data']['user_email'];
						$new_password = $input['data']['new_password'];
						$new_passwordmd5 = $new_password;
						
						$model = $this->loadModel('CLogin');
						$result = $model->addNewpassword($email, $new_passwordmd5);
						
							if($result == 1)
							{
								$message = "<span style='font-size:14px; font-family: calibri;'>
									<b>Dear User</b>,<br /><br />
									We received your request to recover your account.
									Please find below your account's new password:
									<br />
									<p style='font-size:15px;'>".$new_password."</p><br><br><br>
									<b>With Best Regards,<br />
									 Card App/b></span>";
								$to = $email;
								$subject = " CardApp - Account's New Password ";
								$separator = md5(time());
								$eol = PHP_EOL;
								$from = 'krunal.letsnurture@gmail.com';
								
								$headers = "From: Card App <".$from.">".$eol;
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
									$response['message'] = "Password sent on your registered email.";
									echo json_encode($response);
									exit();
								}else{
									$response['status'] = "0";
									$response['data']['error'] = "Failed to process your request. Please try after some time.";
									echo json_encode($response);
									exit();
								}
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Failed to process your request";
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
						if(isset($input['data']['user_email']) && empty($input['data']['user_email'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}
						if(isset($input['data']['new_password']) && empty($input['data']['new_password'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}	
	
	
					}		  
      }
	
	/**
     * @Action:	Change Password
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Change Password
     */
     // http://localhost/mini-master/Login/ChangePass
	 // {"data":{"user_email":"nilesh@gmail.com", "user_pass":"admin", "device_id":"123", "device_type":"2"}}
	 //{"status":"1","data":{"id":"38","firstname":"test","lastname":"shah","user_phone":"9999999","email":"nilesh@gmail.com"}}
	
    public function changePass()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_email']) && !empty($input['data']['user_email']) 
    		 && isset($input['data']['currentpassword']) && !empty($input['data']['currentpassword'])
			 && isset($input['data']['newpassword']) && !empty($input['data']['newpassword']))
					{
						
						
						 $email = $input['data']['user_email'];
						 $currentpassword = md5($input['data']['currentpassword']);
						 $newpassword =  md5($input['data']['newpassword']);
						
						
						
						$model = $this->loadModel('CLogin');
						$result = $model->ChangePassword($email, $currentpassword, $newpassword);
						//print_r($result);
						
							if($result == '1')
							{
								$response['status'] = "1";
								$response['data'] = "Password Successfully Change";
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Your current password not match";
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
						if(isset($input['data']['user_email']) && empty($input['data']['user_email'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass email";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['currentpassword']) && empty($input['data']['currentpassword'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass current password";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['newpassword']) && empty($input['data']['newpassword'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass new password";
							echo json_encode($response);
							exit();
						}	
	
	
					}		  
      }
	    

}
