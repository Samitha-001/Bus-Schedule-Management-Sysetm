<?php 


class conductorprofile
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new User;
            $users = $user->conductorInfo();

			if($user->validate($_POST))
			{
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['role'] = 'coductor';
				$user->insert($_POST);
				redirect('conductorprofile');
			}
			$data['errors'] = $user->errors;		
		}


		$this->view('conductorprofile', $data);
	}

}


