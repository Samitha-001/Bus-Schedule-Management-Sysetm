<?php

class Halt extends Model
{
    protected $table = 'halt';

    // editable columns

    protected $allowedColumns = [
        'id',
        'route_id',
        'name',
        'distance_from_source',
        'fare_from_source'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['route_id'])) {
            $this->errors['route_id'] = "Please enter a route";
        } else
        if (empty($data['halt_name'])) {
            $this->errors['halt_name'] = "Halt name is required";
        } else
        if (empty($data['distance_from_source'])) {
            $this->errors['distance'] = "Enter distance from source";
        }
        else
        if (empty($data['fare_from_source'])) {
            $this->errors['fare'] = "Enter fare from source";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getHalts()
    {
        return $this->findAll();
    }

    public function getHaltRange($src, $dest)
    {
        $halts = $this->findAll();
        $src = $this->first(['name' => $src])->id;
        $dest = $this->first(['name' => $dest])->id;
        $haltRange = [];
        foreach ($halts as $halt) {
            if ($halt->id >= $src && $halt->id <= $dest) {
                $haltRange[] = $halt->name;
            }
        }
        // $haltRange[] = $dest;
        return $haltRange;
    }

    public function addHalt($data)
    {
        $this->insert($data);
    }

    public function deleteHalt($id)
    {
        $this->delete($id);
    }

    // update halt
    public function updateHalt($id, $data)
    {
        return $this->update($id, $data);
    }
}
