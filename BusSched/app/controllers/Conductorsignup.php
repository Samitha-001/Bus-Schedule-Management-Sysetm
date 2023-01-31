<?php


class Conductorsignup
{
	use Controller;

	public function index()
	{
		$data = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new User;
			if ($user->validate($_POST)) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['role'] = 'conductor';
				$user->insert($_POST);
				redirect('conductorlogin');
			}
			$data['errors'] = $user->errors;
		}


		$this->view('conductorsignup', $data);
	}
}
