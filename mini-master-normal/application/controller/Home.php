<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
		$model = $this->loadModel('CHome');
		$results = $model->loadCards();
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
	// Send mail 
	public function mailSend()
    { 	$model = $this->loadModel('CHome');
		
        // load views
      if(isset($_POST['mailId']) && !empty($_POST['mailId']))
		{		include_once('phpmailer/PHPMailerAutoload.php');
				$mail = new PHPMailer;
				//$to = 'support@teamorion.com';
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'ankit.letsnurture@gmail.com';                 // SMTP username
				$mail->Password = 'letsdoit@123';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to
				
				$mail->From = 'ankit.letsnurture@gmail.com';
				$mail->FromName = 'Business Card';
				$mail->addAddress($_POST['mailId']);     // Add a recipient
				//$mail->addAddress('krunal.letsnurture@gmail.com');               // Name is optional
				$mail->addReplyTo('ankit.letsnurture@gmail.com');
				
				$arrays = explode(",", $_POST['rowhiddenid']);
				foreach ($arrays as $arrayId) {
					
					//print_r($model->getImagename($arrayId));
					//$image = "/var/sites/w/www.letsnurture.co.uk/public_html/demo/business-card-app/public/upload/image/".$model->getImagename($arrayId);
					$image = "D:/main xampp/xampp/htdocs/mini-master/public/upload/image/".$model->getImagename($arrayId);
					$mail->addAttachment($image);
				}
				$mail->isHTML(true);  
				$mail->Subject = $_POST['subject'];
				$mail->Body    =  $_POST['message'];
				
				
				if(!$mail->send()) {
				    echo 0;
				} else {
				    echo 1;
				}
		}else {echo 0;}
    }
    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
	
	
	public function testmail()
    {	
       		include_once('phpmailer/PHPMailerAutoload.php');

			$mail = new PHPMailer;
			
			//$mail->SMTPDebug = 3;                               // Enable verbose debug output
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ankit.letsnurture@gmail.com';                 // SMTP username
			$mail->Password = 'letsdoit@123';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			
			$mail->From = 'ankit.letsnurture@gmail.com';
			$mail->FromName = 'Mailer';
			$mail->addAddress('kalpesh.letsnurture@gmail.com', 'Kalpesh');     // Add a recipient
			$mail->addAddress('krunal.letsnurture@gmail.com');               // Name is optional
			$mail->addReplyTo('ankit.letsnurture@gmail.com');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');
			
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment('D:\main xampp\xampp\htdocs\mini-master\public\upload\image\1.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
    }
	
	
	/*
	 * @Author:  krnal
	 * @Created: February 24 2014
	 * @Modified By:krnal
	 * @Modified at: February 24 2014
	 * @Comment: get Search Results
	 */
	public function myCardSearch()
	{
		 if(isset($_POST['search_value'])){
	      	$model = $this->loadModel('CHome');
			$results = $model->getmyCardSearch($_POST['search_value']);
			if($results !=0){
				foreach($results as $result){ 
                    echo '<tr>
                        <td class="selection"><input type="checkbox" class="checkbox" name="sendmaiID" value="'.$result->id.'"></td>
                        <td>'.$result->name.'</td>
                        <td>'. $result->email.'</td>
                        <td class="Cardimg"><img height="150px"  src="'.URL.'public/upload/image/'.$result->image.'" /></td>
                      </tr>';
                    }
              }else{echo 0;}
			
		 }
		
		
    
	}
}
