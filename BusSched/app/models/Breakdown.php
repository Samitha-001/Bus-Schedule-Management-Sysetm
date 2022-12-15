<?php

class Breakdown extends Model{
    protected $table = 'breakdown';

    // editable columns
    protected $allowedColumns = [
		'bus_no',
        'description',
		'date',
        'time',
        'timetorepair'
    ];

    public function validate($data) {
        $this->errors = [];

		if(empty($data['bus_no']))
        {
            $this->errors['bus_no'] = "Bus number is required";
        } else
        if(empty($data['description']))
		{
			$this->errors['description'] = "Enter Description";
		} else
        if(empty($data['date']))
		{
			$this->errors['date'] = "Enter Date";
		} else
        if(empty($data['time']))
		{
			$this->errors['time'] = "Enter Time";
		} else
        if(empty($data['timetorepair']))
		{
			$this->errors['timetorepair'] = "Enter estimate time to repair";
		}
		

		if(empty($this->errors))
		{
			return true;
		}

		return false;
    }

    public function getBreakdown(){
        return $this->findAll();
    }
}