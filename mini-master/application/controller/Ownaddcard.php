<?php
header('Content-Type: application/json; charset=utf-8');
class Ownaddcard extends Controller {

	/**
	 * @Action:	Add own cards
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Add own cards
	 */
	// http://localhost/mini-master/Ownaddcard/addOwnCards
	// {	"data": {       "user_id": "34",       "card_name": "Pratik Patel",       "card_email": "pratik@letsnurture.com",       "card_phone": "09787546452",       "card_website": "http://www.letsnurture.com",       "card_address": "C/404, Ganesh Meridian",       "card_image": "www.letsnurture.co.uk/demo/card/image/image1.jpg",       "card_city": "Ahmedabad",       "card_state": "Gujarat",       "card_notes": "Test Note",       "card_zip": "380061",       "card_work_address": "C/404, Ganesh Meridian",       "card_work_phone": "07940088174"	}}
	//{"status":"1","data":{"message":"Successfully add card"}}

	public function addOwnCards() {
		
		$input = json_decode(file_get_contents('php://input'), TRUE);

		if (isset($input['data']) && !empty($input['data']) 
		&& isset($input['data']['user_id']) && !empty($input['data']['user_id']) 
		&& isset($input['data']['card_name']) && !empty($input['data']['card_name']) 
		&& isset($input['data']['card_email']) && !empty($input['data']['card_email']) 
		&& isset($input['data']['card_phone']) && !empty($input['data']['card_phone']) 
		&& isset($input['data']['card_address']) && !empty($input['data']['card_address'])) {

			$user_id = $input['data']['user_id'];
			$card_name = $input['data']['card_name'];
			$card_email = $input['data']['card_email'];
			$card_phone = $input['data']['card_phone'];
			$card_address = $input['data']['card_address'];
			

			$model = $this -> loadModel('COwnaddcard');
			$result = $model -> addCard($user_id, $card_name, $card_email, $card_phone,$card_address);

			if (isset($result) && !empty($result)) {
				
				while (current($input['data'])) {
					//Remove some key and value
					// if(key($input['data']) == 'user_id' || key($input['data']) == 'card_name' ||  key($input['data']) == 'card_email' ||  key($input['data']) == 'card_address' || key($input['data']) == 'card_phone')
					// {
						// next($input['data']);
						// continue;					
					// }
						
			         $model->AddOwncardsDetail($result,$user_id,key($input['data']),current($input['data']));
					 next($input['data']);
				}
				$response['status'] = "1";
				$response['data']['message'] = "Card added successfully";
				echo json_encode($response);
				exit();
			} else {

				$response['status'] = "0";
				$response['data']['error'] = "Failed to upload card. Please try later.";
				echo json_encode($response);
				exit();
			}

		} else {

			if (!isset($input['data'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass request input";
				echo json_encode($response);
				exit();
			}
			if (empty($input['data'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Request input can't be empty";
				echo json_encode($response);
				exit();
			}
			if (isset($input['data']['user_id']) && empty($input['data']['user_id'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass user id";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_name']) && empty($input['data']['card_name'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card name";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_email']) && empty($input['data']['card_email'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card email";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_phone']) && empty($input['data']['card_phone'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card phone";
				echo json_encode($response);
				exit();
			}else if (isset($input['data']['card_address']) && empty($input['data']['card_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card address";
				echo json_encode($response);
				exit();
			}

		}
	}
	
	
	
	/**
	 * @Action:	Update own card
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Update own card
	 */
	// http://localhost/mini-master/Ownaddcard/updateOwnCards
	// {"data": { "user_id": "34",   "card_id": "1", "card_name": "pratik Patel"}}
	//{"status":"1","data":{"message":"Successfully update card"}}

	public function updateOwnCards() {
		
		$input = json_decode(file_get_contents('php://input'), TRUE);
		
		if (isset($input['data']) && !empty($input['data']) 
		
		&& isset($input['data']['user_id']) && !empty($input['data']['user_id']) 
		&& isset($input['data']['card_id']) && !empty($input['data']['card_id'])) {
		
			$user_id = $input['data']['user_id'];
			$card_id = $input['data']['card_id'];
			
			$model = $this -> loadModel('COwnaddcard');
			$result = $model -> updateOwnCard($input['data']);
			 
		
			if (isset($result) && !empty($result)) {
				$response['status'] = "1";
				$response['data']['message'] = "Card updated successfully";
				echo json_encode($response);
				exit();
			} else {

				$response['status'] = "0";
				$response['data']['error'] = "Failed to update card. Please try later.";
				echo json_encode($response);
				exit();
			}

		} else {

			if (!isset($input['data'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass request input";
				echo json_encode($response);
				exit();
			}
			if (empty($input['data'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Request input can't be empty";
				echo json_encode($response);
				exit();
			}
			if (isset($input['data']['user_id']) && empty($input['data']['user_id'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass user id";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_id']) && empty($input['data']['card_id'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card id";
				echo json_encode($response);
				exit();
			} 
		}
	}
	
	
	
	/**
     * @Action:	get Own Card
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: get Own Card
     */
     // http://localhost/mini-master/Ownaddcard/owncard
	 // {  "data": {"user_id": "34"}}
	 //{"status":"1","data":{"user_id":"34","name":"pratik Patel","phone":"09787546452","email":"pratik@letsnurture.com","website":"http:\/\/www.letsnurture.com","image":"www.letsnurture.co.uk\/demo\/card\/image\/image1.jpg","address":"C\/404, Ganesh Meridian","city":"Ahmedabad","state":"Gujarat","notes":"Test Note","zip_code":"380061","work_address":"C\/404, Ganesh Meridian","work_phone":"07940088174"}}


	
    public function owncard()
    {		//$input = json_decode(file_get_contents('php://input'),TRUE);
    
 	   	 	$input = json_decode(file_get_contents('php://input'), TRUE);
			
    		 if(isset($input['data']) && !empty($input['data'])
			 && isset($input['data']['user_id']) && !empty($input['data']['user_id']))
					{
						
						$userid = $input['data']['user_id'];
						
						$model = $this->loadModel('COwnaddcard');
						$results = $model->getOwnCard($userid);
						//print_r($result);
						
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
										$temp = $output; 
										
								 }	
								 else {
									if($results[$i]["card_id"] != $results[$i+1]["card_id"]) 
									 {
									 	$output["card_id"] = $results[$i]["card_id"];	
									 	$temp = $output;
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
								$response['data']['error'] = "No card found";
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
