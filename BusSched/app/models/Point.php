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
    // TODO: add updating points of users
    public function giftPoints($data)
    {
        echo ($data);
        return $this->insert($data);
    }
}
