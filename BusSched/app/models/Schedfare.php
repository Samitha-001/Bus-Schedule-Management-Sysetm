<?php

class Schedfare extends Model
{
    protected $table = 'fare';

    // editable columns
    protected $allowedColumns = [
        'id',
        'source',
        'dest',
        'route',
        'type',
        'amount',
        'last_updated'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['source'])) {
            $this->errors['source'] = "Source is required";
        } else
        if (empty($data['dest'])) {
            $this->errors['dest'] = "Destination is required";
        } else
        if (empty($data['route'])) {
            $this->errors['route'] = "Bus route is required";
        } else
        if (empty($data['type'])) {
            $this->errors['type'] = "Bus type is required";
        } else
        if (empty($data['amount'])) {
            $this->errors['amount'] = "Amount is required";
        }


        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getFares()
    {
        return $this->findAll();
    }
}
