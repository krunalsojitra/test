<?php
header('Content-Type: application/json; charset=utf-8');
class Appflag extends Controller
{
   


     /**
     * @Action:	Set App Flag 
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Set App Flag
     */
     // http://localhost/mini-master/Appflag/SetAppFlag
	 //{"data": {"user_id": "34", "is_purchased": "1", "device_id": "2"}}
	 
	
    public function setInAppFlag()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_id']) && !empty($input['data']['user_id'])
			 && isset($input['data']['is_purchased']) && !empty($input['data']['is_purchased'])
			 && isset($input['data']['device_id']) && !empty($input['data']['device_id']))
					{
						$user_id = $input['data']['user_id'];
						$is_purchased = $input['data']['is_purchased'];
						$device_id = $input['data']['device_id'];
						 
						$model = $this->loadModel('CAppflag');
						$results = $model->updateAppflag($user_id, $is_purchased, $device_id);
						
							if($results == 1)
							{
								$response['status'] = "1";
								$response['data']['message'] = "Successfully purchased";
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Something wrong please try again";
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
						if(isset($input['data']['user_id']) && empty($input['data']['user_id'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass user id";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['is_purchased']) && empty($input['data']['is_purchased'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass user id";
							echo json_encode($response);
							exit();
						}else if(isset($input['data']['device_id']) && empty($input['data']['device_id'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass user id";
							echo json_encode($response);
							exit();
						}
	
	
					}		  
      }

    /**
     * @Action:	App Flag check
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: App Flag check
     */
     // http://localhost/mini-master/Appflag/InAppFlag
	 //{"data": {"user_id": "34"}}
	 
	
    public function checkAppFlag()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_id']) && !empty($input['data']['user_id']))
					{
						$user_id = $input['data']['user_id'];
						 
						$model = $this->loadModel('CAppflag');
						$results = $model->checkAppflag($user_id);
						
							if($results == 1)
							{
								
								$response['is_purchased'] = "true";
								echo json_encode($response);
								exit();
							}else{
								
								
								$response['is_purchased'] = "false";
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
						if(isset($input['data']['user_id']) && empty($input['data']['user_id'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass user id";
							echo json_encode($response);
							exit();
						}
	
	
					}		  
      }

}
