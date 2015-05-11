<?php

class CAddcard
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
    public function Addcards($user_id, $card_name, $card_email, $card_address)
    {
        $checksql ="SELECT * FROM ".TABLE_USERS." WHERE id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		if(!empty($check)){
			
			 $sql = "INSERT INTO ".TABLE_CARDS."
			( `user_id`,`name`, `email`, `address`)
			 VALUES (:user_id, :name, :email, :address)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':user_id' => $user_id, 
	        					':name' => $card_name,
	        					':email' => $card_email, 
	        					':address' => $card_address);
	       	 $query->execute($parameters);
	       	 return  $this->db->lastInsertId(); 
			
		}else{return $result = 0;}
		
		
        
    }
    
    /**
     * @Action:	Add card detail
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add Card
     */
    public function AddcardsDetail($card_id,$user_id,$key,$value)
    {
        $checksql ="SELECT * FROM ".TABLE_CARDS." WHERE id = :id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':id' => $card_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		if(!empty($check)){
			
			 $sql = "INSERT INTO ".TABLE_CARD_DETAIL."
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
     * @Action:	Add card detail
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add Card side two
     */
    public function addCardSideTwos($card_id,$user_id,$key,$value)
    {
       
			$card_side = 1;
			 $sql = "INSERT INTO ".TABLE_CARD_DETAIL."
			( `user_id`,`card_id`,`meta_key`, `meta_value`, `card_side`)
			 VALUES (:user_id, :card_id, :meta_key, :meta_value, :card_side)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':card_id' => $card_id, 
	        					':meta_key' => $key,
	        					':meta_value' => $value,
								':user_id' => $user_id,
								':card_side' => $card_side);
	       	 $query->execute($parameters);
	       	 //return  $this->db->lastInsertId(); 
			
		
	}

   
}
