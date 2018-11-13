<?php

require_once("server.php");

class insertTransaction extends dbconnect {
	public function saveRecord($name,$gender,$email,$password,$date): string {
		try {
			
			$this->conn->exec($sql);
			
			$sql = "INSERT INTO tbl_applicant(name, gender, email, password, date_registered) VALUES(:name,:gender,:email,:password,:date)";
			$this->query = $this->conn->prepare($sql);
			
			$this->query->execute();
			
			$this->query->execute(array(':name'=>$name,':date'=>$date,':gender'=>$gender,':email'=>$email,':password'=>$password));
			
			return "Registration was successful. Your ID is " . $this->conn->lastInsertId();
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}

?>