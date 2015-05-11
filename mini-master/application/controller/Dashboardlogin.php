<?php
class Dashboardlogin extends Controller
{
   
	 public function index()
    {
    	
        require APP . 'view/dashboardlogin/index.php';
    }
    /**
     * @Action:	Login
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Login
     */
    
    public function authenticate()
    {
		if(isset($_POST['email']) && isset($_POST['password']))		
		{
			$model = $this->loadModel('CDashboardlogin');	
			 $email = $_POST["email"];
			 $password = $_POST["password"];
			$result = $model->Login($email,$password); 
			
		}
	}
	
	public function logout()
    {
		if(isset($_POST['logout']) && isset($_POST['logout']))		
		{	$setcookie = setcookie('email', '', time()-3600, "/");
		  	if($setcookie){
		  		echo 1;
		  	}	
		}
	}
}