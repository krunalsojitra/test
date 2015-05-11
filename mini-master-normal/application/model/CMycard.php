<?php

class CMycard
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
     * @Action:	get all my card
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: get all my card
     */
    public function getMycard($user_id)
    {
        $checksql ="SELECT * FROM ".TABLE_CARDS." WHERE user_id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$allCard = $query->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($allCard)){
			
			return $allCard;
			
		}else{return $result = 0;}
		
		
        
    }

   
}
