<?php

class Availablebus extends Model
{
    protected $table = 'bus_availability';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'type',
        'seats_no',
        'route',
        'start',
        'dest',
        'owner',
        'conductor',
        'driver'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        }
        if (empty($data['type'])) {
            $this->errors['type'] = "Choose bus type";
        }
        if (empty($data['seats_no'])) {
            $this->errors['seats_no'] = "Enter number of available seats";
        }
        if (empty($data['route'])) {
            $this->errors['route'] = "Enter bus route";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getBuses()
    {
        return $this->findAll();
    }

    public function getOwnerBuses($owner)
    {
        return $this->where(['owner' => $owner]);
    }

    public function deleteBus($id)
    {
        return $this->delete($id);
    }
    public function updateBus($id, $data)
    {
        return $this->update($id, $data);
    }

    // add new bus
    public function addBus($data)
    {
        // uppercase first 2 letters of bus number in data
        $data['bus_no'] = strtoupper(substr($data['bus_no'], 0, 2)) . substr($data['bus_no'], 2);
        echo $this->insert($data);
    }

}
