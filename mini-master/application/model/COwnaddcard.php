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
    public function addCard($user_id, $card_name, $card_email, $card_phone, $card_address)
    {
        $checksql ="SELECT * FROM ".TABLE_USERS." WHERE id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		
		if(!empty($check)){
			
			 $sql = "INSERT INTO ".TABLE_OWNCARD."
			( `user_id`,`name`, `phone`, `email`, `address`)
			 VALUES (:user_id, :name, :phone, :email, :address)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':user_id' => $user_id, 
	        					':name' => $card_name,
	        					':phone' => $card_phone,
	        					':email' => $card_email, 
	        					':address' => $card_address);
	       	 $query->execute($parameters);
			return  $this->db->lastInsertId(); 
		}else{return $result = 0;}
	}
	
	/**
     * @Action:	Add own card detail
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add Card
     */
    public function AddOwncardsDetail($card_id,$user_id,$key,$value)
    {
        $checksql ="SELECT * FROM ".TABLE_USERS." WHERE id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		if(!empty($check)){
			
			 $sql = "INSERT INTO ".TABLE_OWNCARD_DETAIL."
			( `user_id`,`card_id`,`meta_key`, `meta_value`)
			 VALUES (:user_id, :card_id, :meta_key, :meta_value)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':card_id' => $card_id, 
	        					':meta_key' => $key,
	        					':meta_value' => $value,
								':user_id' => $user_id);
	       	 $query->execute($parameters);
	       	 //return  $this->db->lastInsertId(); 
			
		}else{return $result = 0;}
		
		
        
    }   
	
	/**
	 * @Action:	Update own card
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Update own card
	 */
    public function updateOwnCard($data)
    {
    	
		
        $checksql ="SELECT * FROM ".TABLE_OWNCARD." WHERE user_id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $data['user_id']);
		$query->execute($parameters);
		$check = $query->fetchAll();
		
		if(!empty($check)){
				//$sql = "UPDATE `own_card_detail` SET `meta_value` = 'krunal' WHERE `user_id` = 34 and `card_id`=1 AND `meta_key`= 'card_name' ";
				
				foreach ($data as $key)
				{
					$sql = "UPDATE ".TABLE_OWNCARD_DETAIL." SET meta_value = :meta_value   WHERE `user_id` = :user_id  AND  `card_id` = :card_id  AND `meta_key`= :meta_key  ";					
					$query = $this->db->prepare($sql);
        			$parameters = array(':user_id' => $data['user_id'], ':card_id' => $data['card_id'],':meta_value' => $key,  ':meta_key' =>  key($data));
					$result = $query->execute($parameters);
					next($data);
				}
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
    	
    	$checksql ="SELECT * FROM ".TABLE_OWNCARD_DETAIL." WHERE user_id = :user_id order  by card_id,meta_key";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $userid);
		$query->execute($parameters);
		$allCard = $query->fetchAll(PDO::FETCH_ASSOC);
		
		if(!empty($allCard)){
			
			return $allCard;
			
		}else{return $result = 0;}
	}

	
	
	
	
}
