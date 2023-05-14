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
        return $this->findAll();
    }

    public function getConductorInfo($conductor)
    {
        return $this->where(['username' => $conductor], 'username')[0];
    }

    public function updateConductor($id, $data)
    {
        $this->update($id, $data, 'username');
    }
}