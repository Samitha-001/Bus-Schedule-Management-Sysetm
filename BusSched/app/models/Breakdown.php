<?php

class Breakdown extends Model
{
    protected $table = 'breakdown';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'description',
        // 'date',
        // 'time',
        'time_to_repair'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        } else
            if (empty($data['description'])) {
                $this->errors['description'] = "Enter Description";
            } else
                if (empty($data['time_to_repair'])) {
                    $this->errors['time_to_repair'] = "Enter estimate time to repair";
                }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getBreakdowns()
    {
        return $this->findAll();
    }

    public function getConductorBreakdowns($conductor)
    {
        // return $this->findAll();
        $data['conductor'] = $conductor;
        // show($data);
        $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data);
        return $breakdowns;
    }

    public function getOwnerBreakdowns($owner)
    {
        // return $this->findAll();
        $data['owner'] = $owner;
        // show($data);
        $breakdowns = $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data);
        return $breakdowns;
    }



    public function addBreakdown($data)
    {
        // validate and add
        // if ($this->validate($data)) {
            return $this->insert($data);
        // }
        // return false;
    }

    public function deleteBreakdown($id)
    {
        return $this->delete($id);
    }

    public function updateBreakdown($id, $data)
    {
        // validate and update
        // if ($this->validate($data)) {
            return $this->update($id, $data);
        // }
        // return false;
    }

}
