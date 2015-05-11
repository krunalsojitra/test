<?php
header('Content-Type: application/json; charset=utf-8');
class Mycard extends Controller
{
   

    /**
     * @Action:	Mycards
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Featch user all card
     */
     // http://localhost/mini-master/Mycard/Mycards
	 //{"data": {"user_id": "34"}}
	 
	
    public function myCards()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_id']) && !empty($input['data']['user_id']))
					{
						$user_id = $input['data']['user_id'];
						 
						$model = $this->loadModel('CMycard');
						$results = $model->getMycard($user_id);
						
							if(isset($results) && !empty($results))
							{
								$data = array();
								$output = array();
								foreach($results as $result){
								
									$data['id'] = $result['id'];
									$data['user_id'] = $result['user_id'];
									$data['name'] = $result['name'];
						            $data['phone'] = $result['phone'];
						            $data['email'] =  $result['email'];
						            $data['website'] = $result['website'];
						            $data['image'] = $result['image'];
						            $data['address'] = $result['address'];
						            $data['city'] = urldecode($result['city']);
						            $data['state'] = urldecode($result['state']);
									$data['notes'] = urldecode($result['notes']);
									$data['zip_code'] = urldecode($result['zip_code']);
									$data['work_address'] = urldecode($result['work_address']);
									$data['facebookID'] = urldecode($result['facebookID']);
									$data['twitterID'] = urldecode($result['twitterID']);
									$data['designation'] = urldecode($result['designation']);
									$data['work_phone'] = urldecode($result['work_phone']);
									$data['created_at'] = urldecode($result['created_at']);
									$data['is_deleted'] = urldecode($result['is_deleted']);
									
						            
						        	$output[] = $data;
								}
								
								$response['status'] = "1";
								$response['data'] = $output;
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Failed to upload card. Please try later.";
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
