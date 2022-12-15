<?php

class Breakdown extends Model{
    protected $table = 'breakdown';

    // editable columns
    protected $allowedColumns = [
        'breakdown_id',
		'bus_no',
        'description',
		'date',
        'time',
        'time_to_repair'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        } else
            if (empty($data['description'])) {
                $this->errors['description'] = "Description is required";
            } else
        if (empty($data['date'])) {
                $this->errors['date'] = "Description is required";
 
        } else
            if (empty($data['time'])) {
                $this->errors['time'] = "Estimate time is required";
        } else
            if (empty($data['time_to_repair'])) {
                $this->errors['time_to_repair'] = "Estimate time is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getBreakdowns()
    {
        return $this->findAll();
    }
}