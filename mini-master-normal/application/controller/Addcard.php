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
		&& isset($input['data']['card_phone']) && !empty($input['data']['card_phone']) 
		&& isset($input['data']['card_address']) && !empty($input['data']['card_address'])) {

			$user_id = $input['data']['user_id'];
			$card_name = $input['data']['card_name'];
			$card_email = $input['data']['card_email'];
			$card_phone = $input['data']['card_phone'];
			$card_website = $input['data']['card_website'];
			$card_address = $input['data']['card_address'];
			$card_image = $input['data']['card_image'];
			$card_city = $input['data']['card_city'];
			$card_state = $input['data']['card_state'];
			$card_notes = $input['data']['card_notes'];
			$card_zip = $input['data']['card_zip'];
			$card_work_address = $input['data']['card_work_address'];
			$card_work_phone = $input['data']['card_work_phone'];
			$card_facebookID = $input['data']['card_facebookID'];
			$card_twitterID = $input['data']['card_twitterID'];
			$card_designation = $input['data']['card_designation'];

			$model = $this -> loadModel('CAddcard');
			$result = $model -> Addcards($user_id, $card_name, $card_email, $card_phone, $card_website, $card_address, 
			$card_image, $card_city, $card_state, $card_notes, $card_zip, $card_work_address,
			$card_work_phone, $card_facebookID, $card_twitterID, $card_designation);

			if (isset($result) && !empty($result)) {
				$response['status'] = "1";
				$response['data']['message'] = "Successfully add card";
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
			} else if (isset($input['data']['card_address']) && empty($input['data']['card_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card address";
				echo json_encode($response);
				exit();
			} 

		}
	}

}
