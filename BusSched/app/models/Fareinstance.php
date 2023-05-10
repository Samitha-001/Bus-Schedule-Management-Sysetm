<?php

class Fareinstance extends Model
{
    protected $table = 'fare_instances';

    protected $allowedColumns = [
        'instance',
        'fare'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['instance'])) {
            $this->errors['instance'] = "Instance is required";
        }
        if (empty($data['fare'])) {
            $this->errors['fare'] = "Fare is required";
        }
        
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getFareInstances($limit=0)
    {
        if($limit == 0) return $this->findAll();
        else return $this->findN($limit, 'instance');
    }
    public function addFare($data)
    {
        // validate and add
        // if ($this->validate($data)) {
            return $this->insert($data);
        // }
        // return false;
    }

    public function deleteFares($id)
    {
        return $this->delete($id);
    }

    public function updateFareinstance($id, $data)
    {
        return $this->update($id, $data);
    }
}