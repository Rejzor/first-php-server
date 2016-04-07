<?php
class response{
	public $code;
	public $value;
	public function __construct($code,$value='0'){
		$this -> code = $code;
		$this -> value = $value;
		} 
	}
function authorize($username,$password,$conn,$token='No received'){
	if (($password == "No received")&&($login == "No received")){
		return new response(203);
	}
	if ($token == "No received"){
		$hashedpwd = md5($password);
		$sql_login_data = "SELECT * FROM accounts WHERE username='".$username."' AND hashedpwd='".$hashedpwd."'";
		$response_for_sql_login_data = $conn->query($sql_login_data);
		if($response_for_sql_login_data->num_rows > 0 ){
			while($row = $response_for_sql_login_data->fetch_assoc()){
				$generated_token=md5(time()."sjfoewfmewprjkew0pijr4epiu^%$#@&@%$&@#lsdkjsdjDoiw(363666");
				$add_token_to_database="UPDATE accounts SET token='".$generated_token."' WHERE username='".$username."' AND hashedpwd='".$hashedpwd."'";//ZMIENIC ADD_TOKEN_TO_DATABASE z SQL_LOGIN_DATA I ZAMKNAC W JEDNEJ LINIJCE
				$conn->query($add_token_to_database); 
				return new response(100,$generated_token);
			}
		}
		else{
			return new response(200);
		}
	}
	else{
		$sql_token_login_data = "SELECT token FROM accounts WHERE token='".$token."' AND username='".$username."'";
		$response_for_sql_token_login_data = $conn->query($sql_token_login_data);
		if($response_for_sql_token_login_data->num_rows > 0 ){
			while($rown = $response_for_sql_token_login_data->fetch_assoc()){
				return new response(101);	
			}
		}
		else{
			return new response(201);
		}

	}

	
}

?>