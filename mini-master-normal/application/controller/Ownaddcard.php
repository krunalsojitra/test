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

		if (isset($input['data']) && !empty($input['data']) && isset($input['data']['user_id']) && !empty($input['data']['user_id']) && isset($input['data']['card_name']) && !empty($input['data']['card_name']) && isset($input['data']['card_email']) && !empty($input['data']['card_email']) && isset($input['data']['card_phone']) && !empty($input['data']['card_phone']) && isset($input['data']['card_website']) && !empty($input['data']['card_website']) && isset($input['data']['card_address']) && !empty($input['data']['card_address']) && isset($input['data']['card_image']) && !empty($input['data']['card_image']) && isset($input['data']['card_city']) && !empty($input['data']['card_city']) && isset($input['data']['card_state']) && !empty($input['data']['card_state']) && isset($input['data']['card_notes']) && !empty($input['data']['card_notes']) && isset($input['data']['card_zip']) && !empty($input['data']['card_zip']) && isset($input['data']['card_work_address']) && !empty($input['data']['card_work_address']) && isset($input['data']['card_work_phone']) && !empty($input['data']['card_work_phone'])&& isset($input['data']['card_facebookID']) && !empty($input['data']['card_facebookID'])
		 && isset($input['data']['card_twitterID']) && !empty($input['data']['card_twitterID'])
		 && isset($input['data']['card_designation']) && !empty($input['data']['card_designation'])) {

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

			$model = $this -> loadModel('COwnaddcard');
			$result = $model -> Addcards($user_id, $card_name, $card_email, $card_phone, $card_website, $card_address, $card_image, $card_city, $card_state, $card_notes, $card_zip, $card_work_address,
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
			} else if (isset($input['data']['card_website']) && empty($input['data']['card_website'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card website";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_address']) && empty($input['data']['card_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card address";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_image']) && empty($input['data']['card_image'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card image";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_city']) && empty($input['data']['card_city'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card city";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_state']) && empty($input['data']['card_state'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card state";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_notes']) && empty($input['data']['card_notes'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card notes";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_zip']) && empty($input['data']['card_zip'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card zip";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_work_address']) && empty($input['data']['card_work_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card work address";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_work_phone']) && empty($input['data']['card_work_phone'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card work phone";
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
	// {	"data": {       "user_id": "34",       "card_name": "pratik Patel",       "card_email": "pratik@letsnurture.com",       "card_phone": "09787546452",       "card_website": "http://www.letsnurture.com",       "card_address": "C/404, Ganesh Meridian",       "card_image": "www.letsnurture.co.uk/demo/card/image/image1.jpg",       "card_city": "Ahmedabad",       "card_state": "Gujarat",       "card_notes": "Test Note",       "card_zip": "380061",       "card_work_address": "C/404, Ganesh Meridian",       "card_work_phone": "07940088174"	}}
	//{"status":"1","data":{"message":"Successfully update card"}}

	public function updateOwnCards() {
		$input = json_decode(file_get_contents('php://input'), TRUE);

		if (isset($input['data']) && !empty($input['data']) && isset($input['data']['user_id']) && !empty($input['data']['user_id']) && isset($input['data']['card_name']) && !empty($input['data']['card_name']) && isset($input['data']['card_email']) && !empty($input['data']['card_email']) && isset($input['data']['card_phone']) && !empty($input['data']['card_phone']) && isset($input['data']['card_website']) && !empty($input['data']['card_website']) && isset($input['data']['card_address']) && !empty($input['data']['card_address']) && isset($input['data']['card_image']) && !empty($input['data']['card_image']) && isset($input['data']['card_city']) && !empty($input['data']['card_city']) && isset($input['data']['card_state']) && !empty($input['data']['card_state']) && isset($input['data']['card_notes']) && !empty($input['data']['card_notes']) && isset($input['data']['card_zip']) && !empty($input['data']['card_zip']) && isset($input['data']['card_work_address']) && !empty($input['data']['card_work_address']) && isset($input['data']['card_work_phone']) && !empty($input['data']['card_work_phone'])
		&& isset($input['data']['card_facebookID']) && !empty($input['data']['card_facebookID'])
		 && isset($input['data']['card_twitterID']) && !empty($input['data']['card_twitterID'])
		 && isset($input['data']['card_designation']) && !empty($input['data']['card_designation'])) {

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

			$model = $this -> loadModel('COwnaddcard');
			$result = $model -> updateOwnCard($user_id, $card_name, $card_email, $card_phone, $card_website, $card_address, $card_image, $card_city, $card_state, $card_notes, $card_zip, $card_work_address, $card_work_phone, $card_facebookID, $card_twitterID, $card_designation);
			//print_r($result);
			if (isset($result) && !empty($result)) {
				$response['status'] = "1";
				$response['data']['message'] = "Successfully update card";
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
			} else if (isset($input['data']['card_website']) && empty($input['data']['card_website'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card website";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_address']) && empty($input['data']['card_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card address";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_image']) && empty($input['data']['card_image'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card image";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_city']) && empty($input['data']['card_city'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card city";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_state']) && empty($input['data']['card_state'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card state";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_notes']) && empty($input['data']['card_notes'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card notes";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_zip']) && empty($input['data']['card_zip'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card zip";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_work_address']) && empty($input['data']['card_work_address'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card work address";
				echo json_encode($response);
				exit();
			} else if (isset($input['data']['card_work_phone']) && empty($input['data']['card_work_phone'])) {
				$response['status'] = "0";
				$response['data']['error'] = "Please pass card work phone";
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
						$result = $model->getOwnCard($userid);
						//print_r($result);
						
							if(isset($result) && !empty($result))
							{
								$data['user_id'] = $result->user_id;
								$data['name'] = $result->name;
								$data['phone'] = $result->phone;
								$data['email'] = $result->email;
								$data['website'] = $result->website;
								$data['image'] = $result->image;
								$data['address'] = $result->address;
								$data['city'] = $result->city;
								$data['state'] = $result->state;
								$data['notes'] = $result->notes;
								$data['zip_code'] = $result->zip_code;
								$data['work_address'] = $result->work_address;
								$data['work_phone'] = $result->work_phone;
								$data['facebookID'] = $result->facebookID;
								$data['twitterID'] = $result->twitterID;
								$data['designation'] = $result->designation;
								
								$response['status'] = "1";
								$response['data'] = $data;
								echo json_encode($response);
								exit();
							}else{
								
								$response['status'] = "0";
								$response['data']['error'] = "Invalid email or password";
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
