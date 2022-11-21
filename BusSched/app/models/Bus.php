<?php

class Bus extends Model{
    protected $table = 'bus';

    // editable columns
    protected $allowedColumns = [
        'id',
		'bus_no',
        'type',
		'seats_no',
        'availability',
        'route',
        'start'
    ];

    public function validate($data) {
        $this->errors = [];

		if(empty($data['bus_no']))
        {
            $this->errors['bus_no'] = "Bus number is required";
        } else
        if(empty($data['type']))
		{
			$this->errors['type'] = "Choose bus type";
		} else
        if(empty($data['seats_no']))
		{
			$this->errors['seats_no'] = "Enter number of available seats";
		} else
        if(empty($data['route']))
		{
			$this->errors['route'] = "Enter bus route";
		} else
        if(empty($data['start']))
		{
			$this->errors['route'] = "Choose starting halt";
		}
		

		if(empty($this->errors))
		{
			return true;
		}

		return false;
    }

    public function getBuses(){
        return $this->findAll();
    }
}