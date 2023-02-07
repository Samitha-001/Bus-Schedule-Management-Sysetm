<?php

class Owner extends Model
{
    protected $table = 'owner';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address'
    ];

    public function ownerInfo()
    {
        return $this->findAll();
    }
}
