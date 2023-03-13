<?php

class User extends Model
{
	protected $table = 'users';

	// editable columns
	protected $allowedColumns = [
		'id',
		'username',
		'email',
		'password',
		'role'
	];

	public function validate($data)
	{
		$this->errors = [];

		if (empty($data['username'])) {
			$this->errors['username'] = "Username is required";
		} else
		if ($this->where(['username' => $data['username']])) {
			$this->errors['username'] = "Username already exists";
		} else		
		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else		
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else		
		if ($this->where(['email' => $data['email']])) {
			$this->errors['email'] = "Email already exists";
		} else
		if (empty($data['password'])) {
			$this->errors['password'] = "Password is required";
		} else
		if ($data['password'] != $data['pwdRepeat']) {
			$this->errors['pwdRepeat'] = "Passwords do not match";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	// validate for edit function
	public function validateEdit($data)
	{
		$this->errors = [];

		if (empty($data['username'])) {
			$this->errors['username'] = "Username cannot be empty";
		} else
		if (empty($data['email'])) {
			$this->errors['email'] = "Email cannot be empty";
		} else
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else
		if ($this->where(['username' => $data['username']])) {
			$this->errors['username'] = "Username already exists";
		} else
		if ($this->where(['email' => $data['email']])) {
			$this->errors['email'] = "Email already exists";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

    public function getUsers()
    {
        return $this->findAll();
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

	public function updateUser($id, $data)
	{
		// validate and update
		if ($this->validateEdit($data)) {
			return $this->update($id, $data);
		}
	}

	public function getUsersDetails($tablename){
		// call join function
		$userinfo = $this->join($tablename, 'users.username', $tablename.".username");
		return $userinfo;
	}
}