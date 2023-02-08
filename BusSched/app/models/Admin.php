<?php

class Admin extends Model
{
    protected $table = 'admin';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address'
    ];

    public function adminInfo()
    {
        return $this->findAll();
    }
}
