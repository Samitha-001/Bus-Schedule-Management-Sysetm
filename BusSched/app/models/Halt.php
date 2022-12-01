<?php

class Halt extends Model{
    protected $table = 'halt';

    // editable columns
    protected $allowedColumns = [
        'route_id',
		'name',
        'distance_from_source'
    ];

    public function validate($data) {
        $this->errors = [];

		if(empty($data['route_id']))
        {
            $this->errors['route_id'] = "Please enter a route";
        } else
        if(empty($data['halt_name']))
		{
			$this->errors['halt_name'] = "Halt name is required";
		} else
        if(empty($data['distance']))
		{
			$this->errors['distance'] = "Enter distance from source";
		}		

		if(empty($this->errors))
		{
			return true;
		}

		return false;
    }

    public function getHalts(){
        return $this->findAll();
    }
}