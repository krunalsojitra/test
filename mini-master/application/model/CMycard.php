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
        $checksql ="SELECT * FROM ".TABLE_CARD_DETAIL." WHERE user_id = :user_id order by card_id,meta_key,card_side";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$allCard = $query->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($allCard)){
			
			return $allCard;
			
		}else{return $result = 0;}
		
		
        
    }

	/**
	 * @Action:	Update my card
	 * @Author:  krunal
	 * @Created: March 25 2015
	 * @Modified By:
	 * @Comment: Update my card
	 */
    public function updateMyCards($data)
    {
    	
		
        $checksql ="SELECT * FROM ".TABLE_CARDS." WHERE user_id = :user_id";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $data['user_id']);
		$query->execute($parameters);
		$check = $query->fetchAll();
		
		if(!empty($check)){
				
				foreach ($data as $key)
				{	// check new meta key
					$checksqlmetakey ="SELECT * FROM ".TABLE_CARD_DETAIL." WHERE `user_id` = :user_id  AND  `card_id` = :card_id AND `meta_key`= :meta_key";
					$query = $this->db->prepare($checksqlmetakey);
					$parametersMatekey = array(':user_id' => $data['user_id'], ':card_id' => $data['card_id'],':meta_key' =>  key($data));
					$query->execute($parametersMatekey);
					$checkMeta = $query->fetchAll();
					if(!empty($checkMeta)){
					
						$sql = "UPDATE ".TABLE_CARD_DETAIL." SET meta_value = :meta_value   WHERE `user_id` = :user_id  AND  `card_id` = :card_id  AND `meta_key`= :meta_key  ";					
						$query = $this->db->prepare($sql);
		    			$parameters = array(':user_id' => $data['user_id'], ':card_id' => $data['card_id'],':meta_value' => $key,  ':meta_key' =>  key($data));
						$result = $query->execute($parameters);
						next($data);
						
					}else{
							// insert new key and value					
							 $sql = "INSERT INTO ".TABLE_CARD_DETAIL."( `user_id`,`card_id`,`meta_key`, `meta_value`) VALUES (:user_id, :card_id, :meta_key, :meta_value)";
						        $query = $this->db->prepare($sql); 
						        $parameters = array(':card_id' => $data['card_id'], 
						        					':meta_key' =>  key($data),
						        					':meta_value' => $key,
													':user_id' => $data['user_id']);
						       	 $query->execute($parameters);
								 next($data);
					}
				}
			return $result; 
			
		}else{return $result = 0;}
	}   
}
