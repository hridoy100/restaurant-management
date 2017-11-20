<?php
require_once 'connection.php';
header('Content-Type: application/json ');
$response = array();
class User{
  private $db;
  private $connection;
  //private $response = array();


  
  
  function __construct(){
    $this->db=new DB_connection();
	$this->connection=$this->db->get_connection();
  }
    public function doesuserexist($job_id,$first_name,$last_name,$phone_number,$hire_date,$birth_date,$email,$salary,$commission_pct,$gender){
        $query="Select *from employee where email='$email' and phone_number='$phone_number' ";
        $result=mysqli_query($this->connection,$query);
		if(mysqli_num_rows($result)>0){
	        $json['success']='Employee Already Exists'; 
	        $json['welcome'] = 'Welcome '.$first_name." ".$last_name;
		    echo json_encode($json);
			mysqli_close($this->connection);
		}
		else{
		   $query="Insert into employee(job_id,first_name,last_name,phone_number,hire_date,birth_date,email,salary,commission_pct,gender) values('$job_id','$first_name','$last_name','$phone_number','$hire_date','$birth_date','$email','$salary','$commission_pct','$gender')";
		 
		   $is_inserted=mysqli_query($this->connection,$query);
		   if($is_inserted==1){
		    $json['success']='Employee Account created Welcome '.$first_name.' '.$last_name;
		   }
		   else{
			   $json['error']=' Wrong password'; 
		   }
		   echo json_encode($json);
		   //echo json_encode($response);
			mysqli_close($this->connection); 
		}
    }


}


    $user =new User();
	if(isset($_POST['job_id'],$_POST['first_name'],$_POST['last_name'],$_POST['phone_number'],$_POST['hire_date'],$_POST['birth_date'],$_POST['email'],$_POST['salary'],$_POST['commission_pct'],$_POST['gender'])){
	   $job_id=$_POST['job_id'];
	   $first_name=$_POST['first_name'];
	   $last_name=$_POST['last_name'];
	   $phone_number=$_POST['phone_number'];
	   $hire_date=$_POST['hire_date'];
	   $birth_date=$_POST['birth_date'];
	   $email=$_POST['email'];
	   $salary=$_POST['salary'];
	   $commission_pct=$_POST['commission_pct'];
	   $gender=$_POST['gender'];

	   $response['job_id'] = $job_id;
	   $response['first_name'] = $first_name;
	   $response['last_name'] = $last_name;
	   $response['phone_number'] = $phone_number;
	   $response['hire_date'] = $hire_date;
	   $response['birth_date'] = $birth_date;
	   $response['email'] = $email;
	   $response['salary'] = $salary;
	   $response['commission_pct'] = $commission_pct;
	   $response['gender'] = $gender;
	   //echo json_encode($response);
		//echo($job_id);

	   if(!empty($email) && !empty($phone_number)){
	    //$encrypted_password=md5($password);
           $user->doesuserexist($job_id,$first_name,$last_name,$phone_number,$hire_date,$birth_date,$email,$salary,$commission_pct,$gender);
	   
	   }
        else{
            echo json_encode("You must fill both fields");
        } 
	
	}








?>