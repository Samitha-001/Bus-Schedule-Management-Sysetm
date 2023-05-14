<?php

class Conductor extends Model
{
    protected $table = 'conductor';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address',
        'licence_no',
        'assigned_bus',
        'date_of_birth',
        'rating',
        'no_of_reviews'
    ];

    public function conductorInfo()
    {
        return $this->findAll('username');
    }

    public function getConductorInfo($conductor)
    {
        return $this->where(['username' => $conductor], 'username')[0];
    }

    public function updateConductor($id, $data)
    {
        $this->update($id, $data, 'username');
    }

    // function to get unassigned conductors
    public function getUnassignedConductors()
    {
        // all conductors
        $all_conductors = $this->findAll('username');
        // all buses
        $bus = new Bus();
        $all_buses = $bus->findAll();
        // unassigned conductors
        $unassigned_conductors = [];
        foreach ($all_conductors as $conductor) {
            $assigned = false;
            foreach ($all_buses as $bus) {
                if ($conductor->username == $bus->conductor) {
                    $assigned = true;
                    break;
                }
            }
            if (!$assigned) {
                array_push($unassigned_conductors, $conductor);
            }
        }

        return $unassigned_conductors;
    }
}