<?php

	require_once 'dbDetails.php';
	
	//$upload_path = 'uploads/';
	
	//$server_ip = gethostbyname(gethostname());
	
	//$upload_url = 'http://'.$server_ip.'/UploadExample/'.$upload_path;
	$response  = array();

	//if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['job_id']) and isset($_POST['job_title']) and isset($_POST['min_salary']) and isset($_POST['max_salary'])){
			$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die('unable to connect to database');
			$job_id = $_POST['job_id'];
			$job_title = $_POST['job_title'];
			$min_salary = $_POST['min_salary'];
			$max_salary = $_POST['max_salary'];

			// $fileinfo = pathinfo($_FILES['image']['name']);
			
			// $extension = $fileinfo['extension'];
			
			// $file_url = $upload_url.getFileName().'.'.$extension;
			
			// $file_path = $upload_path.getFileName().'.'.$extension;

			//try{

				// move_uploaded_file($_FILES['image']['tmp_name'], $file_path);

				$sql = "INSERT INTO jobs(job_id,job_title,min_salary,max_salary) VALUES ('$job_id','$job_title','$min_salary','$max_salary')";
				if(mysqli_query($con,$sql)){
					$response['error'] = false;
					$response['job_id'] = $job_id;
					$response['job_title'] = $job_title;
					$response['min_salary'] = $min_salary;
					$response['max_salary'] = $max_salary;
				}

			// }catch(Exception $e){
			// 	$response['error'] = false;
			// 	$response['message'] = $e->getMessage();
			// 	//$response['name'] = $name;
			// }
		mysqli_close($con);
	}

		// } else{
		// 	$response['error'] = true;
		// 	$response['message'] = 'please choose a file';
		// }

		echo json_encode($response);
		



	// function getFileName(){
	// 	$con =mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die('unable to connect');
	// 	$sql = "SELECT * FROM jobs";
	// 	$result = mysqli_fetch_array(mysqli_query($con,$sql));
	// 	mysqli_close($con);
	// 	if($result['id']==null){
	// 		return 1;
	// 	} else {
	// 		return ++$result['id'];
	// 	}
	// }