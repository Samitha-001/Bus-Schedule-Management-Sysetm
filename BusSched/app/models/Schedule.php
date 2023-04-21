<?php

class Schedule extends Trip
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

    public function generateScheds()
    {
        $availableBuses = array($this->getTrips());
        print_r($availableBuses);
// Calculate the number of buses for each time slot
// $totalBuses = count($availableBuses);
// $morningBuses = ceil($totalBuses * 0.5);
// $dayBuses = ceil($totalBuses * 0.1);
// $eveningBuses = ceil($totalBuses * 0.4);

// // Shuffle the available buses randomly
// shuffle($availableBuses);

// // Schedule the buses for morning time
// $morningSchedule = array_slice($availableBuses, 0, $morningBuses);

// // Schedule the buses for day time
// $daySchedule = array_slice($availableBuses, $morningBuses, $dayBuses);

// // Schedule the buses for office evening time
// $eveningSchedule = array_slice($availableBuses, $morningBuses + $dayBuses, $eveningBuses);

// // Output the bus schedule
// print_r($availableBuses);
// echo "Morning Time Schedule:\n";
// foreach ($morningSchedule as $bus) {
//     echo $bus . "\n";
// }

// echo "\nDay Time Schedule:\n";
// foreach ($daySchedule as $bus) {
//     echo $bus . "\n";
// }

// echo "\nOffice Evening Time Schedule:\n";
// foreach ($eveningSchedule as $bus) {
//     echo $bus . "\n";
// }
    }

    // public function getScheds()
    // {
    //     return $this->findAll();
    // }
}
