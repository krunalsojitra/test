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
        $checksql ="SELECT * FROM ".TABLE_CARDS." WHERE `is_deleted` =0";
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
        $checksql ="SELECT image FROM ".TABLE_CARDS." WHERE `id` = :id";
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
		
		$query = "SELECT * FROM ".TABLE_CARDS." where `name` like  '%$searchvalue%'";
		$query = $this->db->prepare($query);
		$query->execute();
		$allCard = $query->fetchAll();
		//print_r($allCard);
		if(isset($allCard) && !empty($allCard) && count($allCard) >0){
			return $allCard;
		}else{return  0;}
	}
   
}
