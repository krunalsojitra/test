<?php
header('Content-Type: application/json; charset=utf-8');
class Setting extends Controller
{
   


     /**
     * @Action:	Set setting alert and wifi
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Set setting alert and wifi
     */
     // http://localhost/mini-master/Setting/Settings
	 //{"data": {"user_id": "34","alert": "0", "wifi_detection": "0"}}
	 //Alert(ON(1)/OFF(0)) & Wifi Detection(ON(1)/OFF(0))
	 
	
    public function Settings()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			if(!isset($input['data']['user_id']) && empty($input['data']['user_id']) || $input['data']['user_id'] == ""){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass user id";
							echo json_encode($response);
							exit();
			}
			if(!isset($input['data']['alert']) && empty($input['data']['alert']) || $input['data']['alert'] == ""){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass alert setting";
							echo json_encode($response);
							exit();
			}
			if(!isset($input['data']['wifi_detection']) && empty($input['data']['wifi_detection']) || $input['data']['wifi_detection'] == ""){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass wifi detection";
							echo json_encode($response);
							exit();
			}else{
						$user_id = $input['data']['user_id'];
						$alert = $input['data']['alert'];
						$wifi_detection = $input['data']['wifi_detection'];
						 
						$model = $this->loadModel('CSetting');
						$results = $model->updateSetting($user_id, $alert, $wifi_detection);
						
							if($results == 1)
							{
								$response['status'] = "1";
								$response['data']['message'] = "Setting update";
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Something wrong please try again";
								echo json_encode($response);
								exit();
							}
			}
    			  
      }

   

}
