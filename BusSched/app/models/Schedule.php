<?php

class Schedule extends Bus
{
    protected $table = 'schedule';

    // editable columns
    protected $allowedColumns = [
        'id',
        'from_start',
        'to_end',
        'bus_route',
        'bus_no',
        'bus_type',
        'departure',
        'arrival'
    ];

    

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['from'])) {
            $this->errors['from'] = "Source is required";
        } else
        if (empty($data['to'])) {
            $this->errors['to'] = "Destination is required";
        } else
        if (empty($data['bus_route'])) {
            $this->errors['bus_route'] = "Bus route is required";
        } else
        if (empty($data['bus_No'])) {
            $this->errors['bus_route'] = "Bus route is required";
        } else
        if (empty($data['bus_type'])) {
            $this->errors['bus_type'] = "Bus type is required";
        } else
        if (empty($data['departure'])) {
            $this->errors['departure'] = "departure time is required";
        }
        else
        if (empty($data['arrival'])) {
            $this->errors['arrival'] = "arrival time is required";
        }


        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function generateSchedule()
    {
    
    $registeredBuses = $this->getBuses();
        

    $morningBuses = ceil(0.4 * count($registeredBuses));
    $daytimeBuses = ceil(0.2 * count($registeredBuses));
    $eveningBuses = count($registeredBuses) - $morningBuses - $daytimeBuses;

    
    $schedule = [];

    
    for ($i = 0; $i < $morningBuses; $i++) {
        $bus = $registeredBuses[array_rand($registeredBuses)];
        $b = (array)$bus; 
        $schedule[] = [
            'bus_no' => $b['bus_no'],
            'time_slot' => 'morning'
        ];
    }

   
    for ($i = 0; $i < $daytimeBuses; $i++) {
        $bus = $registeredBuses[array_rand($registeredBuses)]; 
        $b = (array)$bus;
        $schedule[] = [
            'bus_no' => $b['bus_no'],
            'time_slot' => 'daytime'
        ];
    }

    
    for ($i = 0; $i < $eveningBuses; $i++) {
        $bus = $registeredBuses[array_rand($registeredBuses)]; 
        $b = (array)$bus;
        $schedule[] = [
            'bus_no' => $b['bus_no'],
            'time_slot' => 'evening'
        ];
    }

    print_r($schedule);
}

    
}