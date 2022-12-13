<?php 


class Signup
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new User;
			if($user->validate($_POST))
			{
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['role'] = 'admin';
				$user->insert($_POST);
				redirect('login');
			}
			$data['errors'] = $user->errors;		
		}


		$this->view('signup', $data);
	}

}
