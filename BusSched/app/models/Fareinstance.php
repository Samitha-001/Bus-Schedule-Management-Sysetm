<?php

class Fareinstance extends Model
{
    protected $table = 'fare_instances';

    protected $allowedColumns = [
        'instance',
        'fare'
    ];

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
}