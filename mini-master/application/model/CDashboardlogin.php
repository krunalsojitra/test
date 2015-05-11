<?php

class CDashboardlogin
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

  //authenticate admin
	public function Login($email,$password)
	{
		
		 $checksql ="SELECT * FROM ".TABLE_ADMIN." WHERE email = :email and password = :password";
		$query = $this->db->prepare($checksql);
        $parameters = array(':email' => $email, ':password' => $password);
		$query->execute($parameters);
		$data =  $query->fetch();
		if(!empty($data)){
			
			if($data->email != ""){
				
				setcookie('email', $data->email , time() + 30*24*60*60, "/");
				echo $reture = 1;
			}
		}else {
			echo $reture = 0;
			
			
		}
		
				
	}
   
}
