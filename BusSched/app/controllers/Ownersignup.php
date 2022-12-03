<?php 


class Ownersignup
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
				$_POST['role'] = 'owner';
				$user->insert($_POST);
				// show($_POST);
				redirect('ownerlogin');
			}

			$data['errors'] = $user->errors;		
		}


		$this->view('ownersignup', $data);
	}

}
