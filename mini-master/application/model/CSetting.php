<?php

class CSetting
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
     * @Action:	Set setting alert and wifi
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Set setting alert and wifi
     */
    public function updateSetting($user_id, $alert, $wifi_detection)
    {
        $sql = "UPDATE ".TABLE_USERS." SET alert_flag = :alert, wifi_detection_flag = :wifi_detection WHERE id = :user_id";
		$query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':alert' => $alert, ':wifi_detection' => $wifi_detection);
		$check = $query->execute($parameters);
		if($query->rowCount() != 0)
		{
			return 1; 	
		 }else{
		 	return 0;
		 }
	}
  
    

   
}
