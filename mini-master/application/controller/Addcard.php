<?php
header('Content-Type: application/json; charset=utf-8');
class Addcard extends Controller {

	/**
	 * @Action:	Add cards
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Add cards
	 */
	// http://localhost/mini-master/Addcard/addCards
	// {	"data": {       "user_id": "34",       "card_name": "Pratik Patel",       "card_email": "pratik@letsnurture.com",       "card_phone": "09787546452",       "card_website": "http://www.letsnurture.com",       "card_address": "C/404, Ganesh Meridian",       "card_image": "www.letsnurture.co.uk/demo/card/image/image1.jpg",       "card_city": "Ahmedabad",       "card_state": "Gujarat",       "card_notes": "Test Note",       "card_zip": "380061",       "card_work_address": "C/404, Ganesh Meridian",       "card_work_phone": "07940088174","card_facebookID": "07940088174",  "card_twitterID": "07940088174",    "card_designation": "07940088174"}}
	//{"status":"1","data":{"message":"Successfully add card"}}

	public function addCards() {
		$input = json_decode(file_get_contents('php://input'), TRUE);
		print_r($input);
		
		
		if (isset($input['data']) && !empty($input['data']) 
		&& isset($input['data']['user_id']) && !empty($input['data']['user_id']) 
		&& isset($input['data']['card_name']) && !empty($input['data']['card_name']) 
		&& isset($input['data']['card_email']) && !empty($input['data']['card_email']) 
		&& isset($input['data']['card_address']) && !empty($input['data']['card_address'])) {
			

			$user_id = $input['data']['user_id'];
			$card_name = $input['data']['card_name'];
			$card_email = $input['data']['card_email'];
			$card_address = $input['data']['card_address'];
			

			$model = $this -> loadModel('CAddcard');
			$result = $model -> Addcards($user_id, $card_name, $card_email, $card_address);
			//print_r($result);
			if (isset($result) && !empty($result)) {
				
				while (current($input['data'])) {
					//Remove some key and value
					// if(key($input['data']) == 'user_id' || key($input['data']) == 'card_name' ||  key($input['data']) == 'card_email' ||  key($input['data']) == 'card_address' || key($input['data']) == 'card_phone')
					// {
						// next($input['data']);
						// continue;					
					// }
						
			         $model->AddcardsDetail($result,$user_id,key($input['data']),current($input['data']));
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
			} else if (isset($input['data']['card_address']) && empty($input['data']['card_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card address";
				echo json_encode($response);
				exit();
			} 

		}
	}

	/**
	 * @Action:	Add cards
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Add cards side two
	 */
	// http://localhost/mini-master/Addcard/addCardSideTwo
	// {	"data": {       "user_id": "34",       "card_name": "Pratik Patel",       "card_email": "pratik@letsnurture.com",       "card_phone": "09787546452",       "card_website": "http://www.letsnurture.com",       "card_address": "C/404, Ganesh Meridian",       "card_image": "www.letsnurture.co.uk/demo/card/image/image1.jpg",       "card_city": "Ahmedabad",       "card_state": "Gujarat",       "card_notes": "Test Note",       "card_zip": "380061",       "card_work_address": "C/404, Ganesh Meridian",       "card_work_phone": "07940088174","card_facebookID": "07940088174",  "card_twitterID": "07940088174",    "card_designation": "07940088174"}}
	//{"status":"1","data":{"message":"Successfully add card"}}

	public function addCardSideTwo() {
		$input = json_decode(file_get_contents('php://input'), TRUE);
		//print_r($input);
		
		
		if (isset($input['data']) && !empty($input['data']) 
		&& isset($input['data']['user_id']) && !empty($input['data']['user_id']) 
		&& isset($input['data']['card_id']) && !empty($input['data']['card_id'])) {
			

			$user_id = $input['data']['user_id'];
			$card_id = $input['data']['card_id'];
			
			

			$model = $this -> loadModel('CAddcard');
			
				
				while (current($input['data'])) {
					//Remove some key and value
					 if(key($input['data']) == 'user_id' || key($input['data']) == 'card_id')
					 {
						next($input['data']);
						 continue;					
					 }
						
			         $model->addCardSideTwos($card_id,$user_id,key($input['data']),current($input['data']));
					 next($input['data']);
				}
				$response['status'] = "1";
				$response['data']['message'] = "Card added successfully";
				echo json_encode($response);
				exit();
			

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
				$response['data']['error'] = "Please pass card name";
				echo json_encode($response);
				exit();
			}

		}
	}


}
