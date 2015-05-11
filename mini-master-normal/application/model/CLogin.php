<?php

class CLogin
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
     * @Action:	Login
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: Login
     */
    public function checkLogin($email, $userpass, $deviceid, $devicetype)
    {
    	$checksql ="SELECT * FROM ".TABLE_USERS." WHERE email = :email and password = :userpass";
		$query = $this->db->prepare($checksql);
        $parameters = array(':email' => $email, ':userpass' => $userpass);
		$query->execute($parameters);
		$data =  $query->fetch();
		if($data){
			if($data->is_active !=1){
				return 3;	
			}
			if(isset($data->email)){
				$userID = $data->id;
				
				
				 $sql = "UPDATE  ".TABLE_USERS." SET  `gcm_id` =  '' WHERE  `gcm_id` = :gcm_id";
				 $query = $this->db->prepare($sql);
        		 $parameters = array(':gcm_id' => $deviceid);
				 $query->execute($parameters);
				
				 $sql = "UPDATE  ".TABLE_USERS." SET  `gcm_id` = :gcm_id WHERE `id` =:id";
				 $query = $this->db->prepare($sql);
        		 $parameters = array(':gcm_id' => $deviceid, ':id' => $userID);
				 $query->execute($parameters);
				return $data; 
			}else{
				return $result = 0;
			}
		}else{
			$result = 0;
			return $result;
		}
	}
	
	
	 /**
     * @Action:	request forgate password
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: request forgate password
     */
    public function reqforgotpass($email, $rand_pass)
    {
    	
				
				 $sql = "UPDATE  ".TABLE_USERS." SET  `unique_code` = :rand_pass WHERE  `email` = :email";
				 $query = $this->db->prepare($sql);
        		 $parameters = array(':email' => $email, ':rand_pass' => $rand_pass);
        		 $result =  $query->execute($parameters);
        		 if($query->rowCount() != 0){
					return 1; 	
				 }else{
				 	return 0;
				 }
				 
		
	}
	
	/**
     * @Action:	forget password after Add new password
     * @Author:  krunal
     * @Created: March 25 2015
     * @Modified By:
     * @Comment: forget password after Add new password
     */
    public function addNewpassword($email, $new_passwordmd5)
    {
    	
				
				 $sql = "UPDATE  ".TABLE_USERS." SET  `password` = :new_passwordmd5 WHERE  `email` = :email";
				 $query = $this->db->prepare($sql);
        		 $parameters = array(':email' => $email, ':new_passwordmd5' => $new_passwordmd5);
        		 $result =  $query->execute($parameters);
        		 if($query->rowCount() != 0){
					return 1; 	
				 }else{
				 	return 0;
				 }
				 
		
	}
	
	/**
     * @Action:	Change Password
     * @Author:  krunal
     * @Created: March 26 2015
     * @Modified By:
     * @Comment: Change Password
     */
     //http://localhost/mini-master/Login/ChangePass
     //{"data":{"user_email":"nilesh@gmail.com","currentpassword":"admin123","newpassword":"admin"}}
    public function ChangePassword($email, $currentpassword, $newpassword)
    {
    	$checksql ="SELECT * FROM ".TABLE_USERS." WHERE email = :email";
		$query = $this->db->prepare($checksql);
        $parameters = array(':email' => $email);
		$query->execute($parameters);
		$data =  $query->fetch();
		if($data){
			
			if($data->password == $currentpassword)
			{
				 $sql = "UPDATE  ".TABLE_USERS." SET  `password` = :password WHERE  email = :email";
				 $query = $this->db->prepare($sql);
        		 $parameters = array(':email' => $email, ':password' => $newpassword);
				$result = $query->execute($parameters);	
				 return $result; 
			}else
			{
				$result = 0;
				return $result;
			}
		}else{
			$result = 0;
			return $result;
		}
	}
   
}
