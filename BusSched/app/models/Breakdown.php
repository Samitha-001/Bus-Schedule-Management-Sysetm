<?php

class Breakdown extends Model
{
    protected $table = 'breakdown';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'description',
        'status',
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
        return $this->where(['status' => "repairing"]);
    }

    public function getmyBreakdowns($busno)
    {
        return $this->where(['bus_no' => $busno]);
    }

    public function getConductorhistoryBreakdowns($busno)
    {
        return $this->where(['bus_no' => $busno]);
    }

    public function getConductorBreakdowns($conductor)
    {
        // return $this->findAll();
        $data['conductor'] = $conductor;
        // // show($data);
        $bus = new Bus();
        $breakdowns = $bus->join('breakdown', 'bus.bus_no','breakdown.bus_no', $data);
        return $breakdowns;
        // ->where(['Status' => "repairing"]);

        // return $this->where(['Status' => "repairing"],['conductor' => $conductor]);
    }

    // public function getConductorBreakdowns($conductor)
    // {
    //     $data['conductor'] = $conductor;
    //     return $this->join('bus', 'breakdown.bus_no', 'bus.bus_no', $data)
    //                 ->where(['Status' => 'repairing', 'conductor' => $conductor])
    //                 ->findAll();
    // }
    
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
        return $this->insert(['bus_no' => $data['bus_no'],'description' => $data['description'],'time_to_repair' => $data['time_to_repair']]);
        // }
        // return false;
    }

    public function deleteBreakdown($id)
    {
        return $this->delete($id);
    }

    
    public function updateBreakdown($id, $data)
    {
        return $this->update($id, ['status' => $data['status']]);
    }

    public function updatemyBreakdown($id, $data)
    {
        return $this->update($id, ['description' => $data['description'],'time_to_repair' => $data['time']]);
    }
}