<?php
header('Content-Type: application/json; charset=utf-8');
class Carddetail extends Controller
{
   

    /**
     * @Action:	Card detail
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Card detail(single card)
     */
     //http://localhost/mini-master/Carddetail/singleCardDetail
     //{"data": {"user_id": "34", "card_id":"2"}}
	 
	
    public function singleCardDetail()
    {
    	 	$input = json_decode(file_get_contents('php://input'),TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_id']) && !empty($input['data']['user_id'])
			 && isset($input['data']['card_id']) && !empty($input['data']['card_id']))
					{
						$user_id = $input['data']['user_id'];
						$card_id = $input['data']['card_id'];
						 
						$model = $this->loadModel('CCarddetail');
						$results = $model->getcardDetail($user_id, $card_id);
						
						if(isset($results) && !empty($results))
							{
								$data = array();
								$output = array();
								$n=0;
								$length = sizeof($results);
								$temp =array();
							
							for($i=0;$i<sizeof($results);$i++)
							{
								 if( $i == $length - 1 )
								 {
								 	    $output["card_id"] = $results[$i]["card_id"];	
								 	    $output[$results[$i]["meta_key"]] = $results[$i]["meta_value"];
										$temp[] = $output; 
										
								 }	
								 else {
									if($results[$i]["card_id"] != $results[$i+1]["card_id"]) 
									 {
									 	$output["card_id"] = $results[$i]["card_id"];	
									 	$temp[] = $output;
										unset($output);
									 }
									 else
									 {
										 $output[$results[$i]["meta_key"]] = $results[$i]["meta_value"];
									 }	 
								 }	
							}
							//print_r($temp);
							$response['status'] = "1";
							$response['data'] = $temp;
							echo json_encode($response);
							exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "There is no card.";
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
						}else if(isset($input['data']['card_id']) && empty($input['data']['card_id'])){
							$response['status'] = "0";
							$response['data']['error'] = "Please pass card id";
							echo json_encode($response);
							exit();
						}
	
	
					}		  
      }

}
