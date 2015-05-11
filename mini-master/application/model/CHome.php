<?php
class CHome
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
    public function loadCards()
    {
        $checksql ="SELECT * FROM ".TABLE_CARD_DETAIL." order by card_id,meta_key";
		$query = $this->db->prepare($checksql);
        //$parameters = array(':user_id' => $user_id);
		$query->execute();
		$allCard = $query->fetchAll(PDO::FETCH_ASSOC);
		
		if(!empty($allCard)){
			
			return $allCard;
			
		}else{return $result = 0;}
		
	 }
   
   	/**
     * @Action:	get all my card
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: get all my card
     */
    public function getImagename($arrayId)
    {	
        $checksql ="SELECT `meta_value` FROM ".TABLE_CARD_DETAIL." WHERE `card_id` = :id AND `meta_key`= 'card_image'";
		$query = $this->db->prepare($checksql);
        $parameters = array(':id' => $arrayId);
		$query->execute($parameters);
		$allCard = $query->fetch(PDO::FETCH_ASSOC);
		
		if(!empty($allCard)){
			
			return $allCard['image'];
			
		}else{return $result = 0;}
	 }
   
   //my card Search
	public function getmyCardSearch($searchvalue)
	{  
		//SELECT `card_id` FROM `my_cads_detail` WHERE `meta_value` LIKE '%krunal%' GROUP BY card_id
		$query = "SELECT * FROM ".TABLE_CARD_DETAIL." WHERE card_id IN (SELECT card_id FROM ".TABLE_CARD_DETAIL." WHERE `meta_value` LIKE '%$searchvalue%') ORDER BY `card_id`,meta_key"; 
		//$query = "SELECT * FROM ".TABLE_CARD_DETAIL." where `meta_value` like  '%$searchvalue%'";
		$query = $this->db->prepare($query);
		$query->execute();
		$allCard = $query->fetchAll(PDO::FETCH_ASSOC);
		
		if(isset($allCard) && !empty($allCard) && count($allCard) >0){
			return $allCard;
		}else{return  0;}
	}
   
}
