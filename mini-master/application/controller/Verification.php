<?php
//header('Content-Type: application/json; charset=utf-8');
class Verification extends Controller
{
   

      /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function account($activeCode)
    {
        // load views
         $model = $this->loadModel('CVerifyAccount');
	     $check = $model->verifyAccount($activeCode);
		
		 if(!empty($check[0]->id))
	     {
	     	 $result = $model->activateAccount($check[0]->id);
			 $result=1;
					
	     }else $result=0;
		 
        require APP . 'view/verification/account.php';
        
    }

 

}

