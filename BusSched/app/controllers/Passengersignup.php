<?php


class Passengersignup
{
	use Controller;

	public function index()
	{
		$data = [];

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new User;
			if ($user->validate($_POST)) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				// $_POST['role'] = 'passenger';
				$user->insert($_POST);
                //add licence_no to drivers and conductors
                if($_POST['role'] == 'driver'){
                    $driver = new Driver;
                    $driver->updateDriver($_POST['username'], ['licence_no' => $_POST['licence_no']]);
                }else if($_POST['role'] == 'conductor'){
                    $conductor = new Conductor;
                    $conductor->updateConductor($_POST['username'], ['licence_no' => $_POST['licence_no']]);
                }
				redirect('login');
			}
			$data['errors'] = $user->errors;
		}

		$this->view('passengersignup', $data);
	}
}
