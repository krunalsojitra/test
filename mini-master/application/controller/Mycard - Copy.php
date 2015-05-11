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
						//print_r($results);
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
								$response['data']['error'] = "No card Found";
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
