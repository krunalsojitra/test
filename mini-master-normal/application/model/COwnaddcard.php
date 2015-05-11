<?php

class COwnaddcard
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

  
     /**
     * @Action:	Add Card
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add Card
     */
    public function addOwnCard($user_id, $card_name, $card_email, $card_phone, $card_website, $card_address, $card_image, $card_city, $card_state, $card_notes, $card_zip, $card_work_address, 
    $card_work_phone, $card_facebookID, $card_twitterID, $card_designation)
    {
        $checksql ="SELECT * FROM ".TABLE_USERS." WHERE id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		if(!empty($check)){
			
			 $sql = "INSERT INTO ".TABLE_CARDS."
			( `user_id`,`name`, `phone`, `email`, `website`, `image`, `address`, `city`, `state`, `notes`, `zip_code`, `work_address`, `work_phone`, `facebookID`, `twitterID`, `designation`)
			 VALUES (:user_id, :name, :phone, :email, :website, :image, :address, :city, :state, :notes, :zip_code, :work_address, :work_phone, :facebookID, :twitterID, :designation)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':user_id' => $user_id, 
	        					':name' => $card_name,
	        					':phone' => $card_phone,
	        					':email' => $card_email, 
	        					':website' => $card_website, 
	        					':image' => $card_image, 
	        					':address' => $card_address, 
	        					':city'=>$card_city,
								':state' => $card_state,
								':notes' => $card_notes,
								':zip_code' => $card_zip,
								':work_address' => $card_work_address,
								':work_phone' => $card_work_phone,
								':facebookID' => $card_facebookID,
								':twitterID' => $card_twitterID,
								':designation' => $card_designation);
	       	return $result =$query->execute($parameters);
			
		}else{return $result = 0;}
	}
	
	
	
	/**
	 * @Action:	Update own card
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Update own card
	 */
    public function updateOwnCard($user_id, $card_name, $card_email, $card_phone, $card_website, $card_address, $card_image, $card_city, $card_state, $card_notes, $card_zip, $card_work_address, $card_work_phone, $card_facebookID, $card_twitterID, $card_designation)
    {
        $checksql ="SELECT * FROM ".TABLE_OWNCARD." WHERE user_id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		
		if(!empty($check)){
				 $sql = "UPDATE  ".TABLE_OWNCARD." SET  `name`= :name, `phone`= :phone, `email`= :email, `website` = :website, `image` = :image, `address` = :address,
			 	`city`= :city, `state`= :state, `notes`= :notes, `zip_code`= :zip_code, `work_address`= :work_address, `work_phone`= :work_phone,
			 	`facebookID`= :facebookID,
			 	 `twitterID`= :twitterID,
			 	 `designation`= :designation WHERE  user_id = :user_id";
				$query = $this->db->prepare($sql);
	        	 $parameters = array(':user_id' => $user_id, 
		        					':name' => $card_name,
		        					':phone' => $card_phone,
		        					':email' => $card_email, 
		        					':website' => $card_website, 
		        					':image' => $card_image, 
		        					':address' => $card_address, 
		        					':city'=>$card_city,
									':state' => $card_state,
									':notes' => $card_notes,
									':zip_code' => $card_zip,
									':work_address' => $card_work_address,
								':work_phone' => $card_work_phone,
								':facebookID' => $card_facebookID,
								':twitterID' => $card_twitterID,
								':designation' => $card_designation);
				//print_r($parameters);
	        $result = $query->execute($parameters);
		    return $result; 
			
		}else{return $result = 0;}
	}
	
	
	 /**
     * @Action:	Get Own Card
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Get Own Card
     */
    public function getOwnCard($userid)
    {
    	$checksql ="SELECT * FROM ".TABLE_OWNCARD." WHERE user_id = :userid";
		$query = $this->db->prepare($checksql);
        $parameters = array(':userid' => $userid);
		$query->execute($parameters);
		$data =  $query->fetch();
		if($data){
			
			return $data;
		}else{
			$result = 0;
			return $result;
		}
	}

   
}
