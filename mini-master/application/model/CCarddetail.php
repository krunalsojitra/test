<?php

class CCarddetail
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
     * @Action:	Card detail
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Card detail
     */
    public function getcardDetail($user_id, $card_id)
    {
        $checksql ="SELECT * FROM ".TABLE_CARD_DETAIL." WHERE user_id = :user_id and card_id = :card_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id, ':card_id' => $card_id);
		$query->execute($parameters);
		$check = $query->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($check)){
			
			return $check;
			
		}else{return $result = 0;}
		
		
        
    }

   
}
