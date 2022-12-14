<?php

class Conductorlogin {

    use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new User;
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				$arr['email'] = $_POST['email'];
			}
			else
			{
				$arr['username'] = $_POST['email'];
			}
			
			$row = $user->first($arr);
			
			if($row)
			{
				if(password_verify($_POST['password'],$row->password))
				{
					$_SESSION['USER'] = $row;
					redirect('home');
				}
			}
			$user->errors['email'] = "Wrong email or password";

			$data['errors'] = $user->errors;
		}

		$this->view('conductorlogin', $data);
    }
}
