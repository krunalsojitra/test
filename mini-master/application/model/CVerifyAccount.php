<?php

class CVerifyAccount
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

  
    //function for verifying account activation code
	public function verifyAccount($activeCode)
	{
		$query = "SELECT * FROM ".TABLE_USERS." where activation_code = :activeCode";
		$query = $this->db->prepare($query);
        $parameters = array(':activeCode' => $activeCode);
		$query->execute($parameters);
		return $check = $query->fetchAll();
	
	}
	
	//activate customer account
	public function activateAccount($id)
	{
		 $query = "update ".TABLE_USERS." set is_active=:is_active, activation_code='' where id=:id";
		$query = $this->db->prepare($query);
        $parameters = array(':id' => $id ,':is_active' => 1);
		 $query->execute($parameters);
		
	}
   
}
