<?php

class CAppflag
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
     * @Action:	Set App Flag 
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Set App Flag
     */
    public function updateAppflag($user_id, $is_purchased, $device_id)
    {
        $sql = "UPDATE ".TABLE_USERS." SET in_app_flag = :is_purchased WHERE id = :user_id and gcm_id = :device_id";
		$query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':device_id' => $device_id, ':is_purchased' => $is_purchased);
		$check = $query->execute($parameters);
		if($query->rowCount() != 0)
		{
			return 1; 	
		 }else{
		 	return 0;
		 }
	}
  
     /**
     * @Action:	App Flag check
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: App Flag check
     */
    public function checkAppflag($user_id)
    {
        $checksql ="SELECT * FROM ".TABLE_USERS." WHERE id = :user_id ";
		$query = $this->db->prepare($checksql);
        $parameters = array(':user_id' => $user_id);
		$query->execute($parameters);
		$check = $query->fetchAll();
		if(!empty($check))
		{
			return $check[0]->in_app_flag;
		}else{return $result = 0;}
	}

   
}
