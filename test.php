<?php 

//customer
define('FROM_EMAIL', 'TeamOrion Support <support@teamorion.com>');
define('TO_EMAIL', 'nano@teamorion.com');
define('CC_EMAIL', 'lorenz@teamorion.com');

//Admin
define('FROM_EMAIL', 'support@teamorion.com');
define('TO_EMAIL', 'lorenz@teamorion.com, nano@teamorion.com, philippe@teamorion.com');

//Manudafacture
define('FROM_EMAIL', 'TeamOrion Support <support@teamorion.com>');
define('TO_EMAIL', 'lorenz@teamorion.com, nano@teamorion.com, philippe@teamorion.com');
?>


<?php
//Contact us
//  D:\main xampp\xampp\htdocs\serial-tool\application\controller\Contact.php
$message = "<span style='font-size:14px; font-family: calibri;'>
<b>Dear Admin,<br /><br />
You have received one customer enquiry from Product Registration and Support. Enquiry details are listed below:
</b><br />
<p>Customer Id   : ".$_SESSION['customer_id']."</p>
<p>Customer Name : ".ucwords($_SESSION['firstname'].' '.$_SESSION['lastname'])."</p>
<p>Customer Email: ".$_SESSION['email']."</p>
<br>
<p><u>Subject</u>: <br>".ucfirst($_POST['subject'])."</p>
<p><u>Message</u>: <br>".ucfirst($_POST['message'])."</p>

<br /><br />

<b>With Best Regards,<br />
Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
</span>";
			
$to = TO_EMAIL;
$subject = " Customer Enquiry - Product Registration and Support (Team Orion)";
$separator = md5(time());
$eol = PHP_EOL;
$from = FROM_EMAIL;


//Login signup function 
// D:\main xampp\xampp\htdocs\serial-tool\application\controller\Login.php
$message = "<span style='font-size:14px; font-family: calibri;'>
<b>Dear ".ucwords($firstname).",<br /><br />Thank you for connecting your account with Team Orion!</b><br />
<br />
But before we can activate your account, one last step must be taken to complete your registration process.<br /><br />
Please note, you must complete this last step to become a registered member. You will only need to visit activation URL once to activate your account.<br /><br />
To complete your registration, please visit below URL:
<br /><br />
<a href='".URL."Account/Verification/".$verification_code."'>".URL."Account/Verification/".$verification_code."</a>
<br /><br />


<b>With Best Regards,<br />
Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
</span>";
			
$to = $_POST['email'];
$subject = "Team Orion - Account Email Confirmation";
$separator = md5(time());
$eol = PHP_EOL;
//$from = 'support@teamorion.com';
$from = FROM_EMAIL;



//login resend confirmation mail
// D:\main xampp\xampp\htdocs\serial-tool\application\controller\Login.php
$message = "<span style='font-size:14px; font-family: calibri;'>
<b>Dear ".ucwords($result['firstname']).",<br /><br />Thank you for connecting your account with Team Orion!</b><br />
<br />
But before we can activate your account, one last step must be taken to complete your registration process.<br /><br />
Please note, you must complete this last step to become a registered member. You will only need to visit activation URL once to activate your account.<br /><br />
To complete your registration, please visit below URL:
<br /><br />
<a href='".URL."Account/Verification/".$verification_code."'>".URL."Account/Verification/".$verification_code."</a>
<br /><br />


<b>With Best Regards,<br />
Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
</span>";
			
$to = $email;
$subject = "Team Orion - Account Email Confirmation";
$separator = md5(time());
$eol = PHP_EOL;
//$from = 'support@teamorion.com';
$from = FROM_EMAIL;


//login forgot password
// D:\main xampp\xampp\htdocs\serial-tool\application\controller\Login.php
$message = "<p>Dear ".ucwords($details['firstname']).",</p>
				 		    <p>Please find your new account password mentioned below.</p>
						 	<p>Login Email : <b>".urldecode($details['email'])."</b></p>
						 	<p>Password : <b>".$password."</b></p><br/><br/><br/>
						 	<b>With Best Regards,<br />
							Team Orion (<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							";
				 
				 $to = $_POST['email'];
				 $subject = "Team Orion - New Account Details";
				 $separator = md5(time());
				 $eol = PHP_EOL;
				 //$from = 'support@teamorion.com';
				 $from = FROM_EMAIL;
				 
				 
//send submitted order 
//D:\main xampp\xampp\htdocs\serial-tool\application\controller\Product.php 
$message = "<span style='font-size:14px; font-family: calibri;'>
							Dear Admin,<br /><br />
							New order has been submitted by Customer for Customizable Product. Please find order details below:<br />
							
							<h4>Customizable Text Details</h4>
							<hr>
							<p>Custom Text: <span style='color: #e02222; font-size:16px;'>".urldecode($data['custom_text'])."</span></p>
							<br>
							
							<h4>Customer Contact Details</h4>
							<hr>
							<p>Customer ID: ".urldecode($data['customer_id'])."</p>
							<p>Customer Name: ".ucwords(urldecode($data['customer_name']))."</p>
							<p>Email Address: ".urldecode($data['email'])."</p>
							<p>Telephone: ".urldecode($data['telephone'])."</p>
							<p>Address: ".ucfirst(urldecode($data['address']))."</p>
							<p>City: ".ucwords(urldecode($data['city']))."</p>
							<p>Country: ".ucwords(urldecode($data['country']))."</p>
							<p>Zipcode: ".urldecode($data['zipcode'])."</p>
							<br>
							
							<h4>Product Details</h4>
							<hr>
							<img src='".urldecode($data['image'])."'/>
							<p>Part No: ".urldecode($data['part_no'])."</p>
							<p>Product Name: ".ucwords(urldecode($data['product_name']))."</p>
							<p>Image: ".urldecode($data['image'])."</p>
							<p>Price: $".urldecode($data['price'])."</p>
							<p>Product Link: ".urldecode($data['product_link'])."</p>
							<br>
							<br><br>
							
							
							<b>With Best Regards,<br />
							Team Orion Support(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
							
				//$to = "lorenz@teamorion.com, nano@teamorion.com, philippe@teamorion.com";
				$to = TO_EMAIL;
				$subject = "Team Orion - New Order Details";
				$separator = md5(time());
				$eol = PHP_EOL;
				//$from = 'support@teamorion.com';
				$from = FROM_EMAIL;
				
				
//send enquiry details to admin
//D:\main xampp\xampp\htdocs\serial-tool\application\controller\Support.php
$message = "<span style='font-size:14px; font-family: calibri;'>
							<b>Dear Admin,<br /><br />You have received customer enquiry for Product Support.</b><br />
							<br />
							Product Support enquiry details are mentioned below:
							<br /><br />
							<p>Product: <span style='font-size:16px;'>".$_POST['product']."</span></p>
							<p>Message: <span style='font-size:16px;'>".$_POST['messageBody']."</span></p>
							<p>You have received an answer from one of our support agents regarding your support enquiry.</p>
							<p>Please login into your account at <a href='http://teamorion.com/'> http://my.teamorion.com</a> to see the reply.</p>
							<br /><br /><b>With Best Regards,<br />
							Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
				
				//$to = 'support@teamorion.com';
				$to = TO_EMAIL;
				$cc = CC_EMAIL;
				$subject = "Team Orion - Product Support Enquiry";
				$separator = md5(time());
				$eol = PHP_EOL;
				$from = $_SESSION['email'];
			
//ReplySendEnquiry
//D:\main xampp\xampp\htdocs\serial-tool\application\controller\Support.php
$message = "<span style='font-size:14px; font-family: calibri;'>
							<b>Dear Admin,<br /><br />You have received customer enquiry for Product Support.</b><br />
							<br />
							Product Support enquiry details are mentioned below:
							<br /><br />
							<p>Product: <span style='font-size:16px;'>".$_POST['product']."</span></p>
							<p>Message: <span style='font-size:16px;'>".$_POST['message']."</span></p>
							<p>You have received an answer from one of our support agents regarding your support enquiry.</p>
							<p>Please login into your account at <a href='http://teamorion.com/'> http://my.teamorion.com</a> to see the reply.</p>
							<br /><br /><b>With Best Regards,<br />
							Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
				
				//$to = 'support@teamorion.com';
				$to = TO_EMAIL;
				$cc = CC_EMAIL;
				$subject = "Team Orion - Product Support Enquiry";
				$separator = md5(time());
				$eol = PHP_EOL;
				$from = $_SESSION['email'];
				
				
//manually investigate errors from the fraud checking
// D:\main xampp\xampp\htdocs\serial-tool\application\views\product-customize\ipn.php
$message = "<span style='font-size:14px; font-family: calibri;'>
					<b>Dear Admin,</b><br /><br />
					A payment has been made but is flagged as INVALID or considered as fraudulent case.
					Please verify the payment manualy and contact the buyer.
					<br />
					<p>Buyer Name   : <b>".ucwords($_POST['first_name']." ".$_POST['last_name'])."</b></p>
					<p>Buyer Email: <b>".$_POST['payer_email']."</b></p>
					<br>
					<b>Error messages generated during payment checks:</b>
					<p><i>".$errmsg."</i></p>
					<br/>
					<p style='color:red;'>*Note: More details regarding payment transaction are attached below in mail.</p>
					<br/>
					<br/>
					<b>With Best Regards,<br />
					Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
					</span>
					";
					
		$separator = md5(time());
		$eol = PHP_EOL;
		$to      = 'kalpana@letsnurture.com, hitendra@letsnurture.com';
		$subject = 'Product Order | Invalid Payment';
		
		$from = 'support@teamorion.com';
		//$from = "kalpana@letsnurture.com";

		
//
//D:\main xampp\xampp\htdocs\serial-tool\application\views\product-customize\ipn.php
$message = "<span style='font-size:14px; font-family: calibri;'>
			<b>Dear Admin,</b><br /><br />
			A payment has been successfully made. 
			Please find below contact details of the buyer:	<br />
			<p>Buyer Name   : <b>".ucwords($_POST['first_name']." ".$_POST['last_name'])."</b></p>
			<p>Buyer Email: <b>".$_POST['payer_email']."</b></p>
			<br>
			<br/>
			<p style='color:red;'>*Note: More details regarding payment transaction are attached below in mail.</p>
			<br/>
			<br/>
			<b>With Best Regards,<br />
			Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
			</span>
			";
			
		$separator = md5(time());
		$eol = PHP_EOL;
		$to      = 'kalpana@letsnurture.com, hitendra@letsnurture.com';
		$subject = 'Product Order | Successful Payment';
		
		//$from = 'support@teamorion.com';
		$from = "kalpana@letsnurture.com";
		
		

// manually investigate the invalid IPN
//D:\main xampp\xampp\htdocs\serial-tool\application\views\product-customize\ipn.php
   $message = "<span style='font-size:14px; font-family: calibri;'>
				<b>Dear Admin,</b><br /><br />
				A payment has been made but is flagged as INVALID IPN. 
				Please verify the payment manualy and contact the buyer.
				<br />
				<p>Buyer Name   : <b>".ucwords($_POST['first_name']." ".$_POST['last_name'])."</b></p>
				<p>Buyer Email: <b>".$_POST['payer_email']."</b></p>
				<br>
				<br/>
				<p style='color:red;'>*Note: More details regarding payment transaction are attached below in mail.</p>
				<br/>
				<br/>
				<b>With Best Regards,<br />
				Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
				</span>
				";
				
	$separator = md5(time());
	$eol = PHP_EOL;
	$to      = 'kalpana@letsnurture.com, hitendra@letsnurture.com';
	$subject = 'Product Order | Invalid Paypal IPN';
	
	//$from = 'support@teamorion.com';
	$from = "kalpana@letsnurture.com";
	
	
	
	
	
	
	
	
	
/////////////////////////////////////////////////////////////////////////////// Admin mail ///////////////////////////////////////////////////////////////////////
// add Requestmoney Send mail to customer request money
//  D:\main xampp\xampp\htdocs\serial-tool\xadmin\application\controller\Customers.php 	
$message = "<span style='font-size:14px; font-family: calibri;'>
							<b>Dear ".$customerName.",<br />
							<p>Message: <span style='font-size:16px;'>".$message."</span></p>
							<p>Price: <span style='font-size:16px;'>".$req_price."</span></p>
							<p>You have received an replacement product support.</p>
							<p>Please login into your account at <a href='http://teamorion.com/'> http://my.teamorion.com</a> to see the reply.</p>
							<p>Please check your <a href='http://teamorion.com/Support'> http://my.teamorion.com/Support</a> to see the request payment.</p>
							<br /><br /><b>With Best Regards,<br />
							Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
				
				//$to = 'support@teamorion.com';
				$to = $customerEmail;
				//$cc = TO_EMAIL;
				$subject = "Team Orion - Replacement Product";
				$separator = md5(time());
				$eol = PHP_EOL;
				$from = FROM_EMAIL;
			
//send new password to admin
//  D:\main xampp\xampp\htdocs\serial-tool\xadmin\application\controller\Login.php
$message = "<p>Dear Admin,</p>
				 		    <p>Please find your new account password mentioned below.</p>
						 	<p>Username : <b>".$details['username']."</b></p>
						 	<p>Password : <b>".$password."</b></p><br/><br/><br/>
						 	<b>With Best Regards,<br />
							Team Orion (<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							";
				 
				 $to = $_POST['email'];
				 $subject = "TeamOrion - New Account Details";
				 $separator = md5(time());
				 $eol = PHP_EOL;
				 //$from = 'support@teamorion.com';
				 $from = FROM_EMAIL;
	
	

// admin Reply Send Enquiry	
//  D:\main xampp\xampp\htdocs\serial-tool\xadmin\application\controller\Support.php 
$message = "<span style='font-size:14px; font-family: calibri;'>
							<b>Dear ".$receiver_customer_name.",<br />
							<br />
							<p>You have received an answer from one of our support agents regarding your support enquiry.</p>
							<p>Please login into your account at <a href='http://teamorion.com/'> http://my.teamorion.com</a> to see the reply.</p>
							<br /><br /><b>With Best Regards,<br />
							Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
				
				//$to = 'support@teamorion.com';
				$to = $receiver_email;
				//$cc = TO_EMAIL;
				$subject = "Team Orion - Product Support Enquiry";
				$separator = md5(time());
				$eol = PHP_EOL;
				//$from = "kalpana@letsnurture.com";
				$from =  FROM_EMAIL;
				
				
//Reply Forward Enquiry
//  D:\main xampp\xampp\htdocs\serial-tool\xadmin\application\controller\Support.php
$message = "<span style='font-size:14px; font-family: calibri;'>
							<b>Dear User,<br />
							<br /><br />
							Product Support enquiry details are mentioned below:
							<br /><br />
							<p>Product: <span style='font-size:16px;'>".$product."</span></p>
							<p>Message: <span style='font-size:16px;'>".$message."</span></p>
							<p>Please login into your account at <a href='http://teamorion.com/'> http://my.teamorion.com</a> to see the reply.</p>
							<br /><br /><b>With Best Regards,<br />
							Team Orion(<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							</span>";
				
				//$to = 'support@teamorion.com';
				$to = $forward_mail;
				//$cc = TO_EMAIL;
				$subject = "Team Orion - Product Support Enquiry";
				$separator = md5(time());
				$eol = PHP_EOL;
				//$from = "kalpana@letsnurture.com";
				$from =  FROM_EMAIL;
				
/////////////////////////////////////////////////////////////////////////////// Manufact mail ///////////////////////////////////////////////////////////////////////				
//Forgot password manufact
//D:\main xampp\xampp\htdocs\serial-tool\xmanufact\application\controller\Login.php 
$message = "<p>Dear ".ucwords($details['name']).",</p>
				 		    <p>Please find your new account password details mentioned below.</p>
						 	<p>Username : <b>".$details['username']."</b></p>
						 	<p>Password : <b>".$password."</b></p><br/><br/><br/>
						 	<b>With Best Regards,<br />
							Team Orion (<a href='http://teamorion.com/'>www.teamorion.com</a>)</b>
							";
				 
				 $to = $_POST['email'];
				 $subject = "TeamOrion - New Account Details";
				 $separator = md5(time());
				 $eol = PHP_EOL;
				 //$from = 'support@teamorion.com';
				 $from = FROM_EMAIL;