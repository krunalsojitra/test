<?php

class CRegistration
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
     * @Action:	Add new user
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Add new user in user table
     */
    public function addRegUser($firstname, $lastname, $email, $userpass, $userphone, $deviceid, $devicetype, $activation_code)
    {
        $checksql ="SELECT email FROM ".TABLE_USERS." WHERE email = :email";
		$query = $this->db->prepare($checksql);
        $parameters = array(':email' => $email);
		$query->execute($parameters);
		
		if( !isset($query->fetch()->email)){
			
			$sql = "INSERT INTO ".TABLE_USERS."(firstname, lastname, email, password, user_phone, gcm_id, device_type, activation_code) VALUES (:firstname, :lastname, :email, :userpass, :userphone, :deviceid, :devicetype, :activationcode)";
	        $query = $this->db->prepare($sql);
	        $parameters = array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':userpass' => $userpass, ':userphone' => $userphone, ':deviceid' => $deviceid , ':devicetype' => $devicetype, ':activationcode'=>$activation_code);
	       	return $result =$query->execute($parameters);
			//print_r($result);
		}else{return $result = 0;}
		
		
        
    }

   
}
