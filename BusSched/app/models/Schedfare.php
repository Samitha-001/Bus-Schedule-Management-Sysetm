<?php

class Schedfare extends Model
{
    protected $table = 'fare';

    // editable columns
    protected $allowedColumns = [
        'id',
        'source',
        'dest',
        'route_bus',
        'type_bus',
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
        if (empty($data['route_bus'])) {
            $this->errors['route_bus'] = "Bus route is required";
        } else
        if (empty($data['type_bus'])) {
            $this->errors['type_bus'] = "Bus type is required";
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
