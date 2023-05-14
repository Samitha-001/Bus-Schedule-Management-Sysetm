<?php

class Owner extends Model
{
    protected $table = 'owner';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address',
        'dob',
        'profile_pic',
    ];

    public function ownerInfo()
    {
        return $this->findAll();
    }

    // updateowner function
    public function updateOwner($id, $data)
    {
        $this->update($id, $data, 'username');
    }
}
