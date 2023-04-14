<?php

class Point extends Model
{
    protected $table = 'points';

    // editable columns

    protected $allowedColumns = [
        'id',
        'points_from',
        'points_to',
        'amount'
    ];

    // record point gifting
    public function addPoints($data)
    {
        return $this->insert($data);
    }
}
