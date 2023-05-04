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
    $reg_bus = new Bus;
    $registeredBuses = $reg_bus->getBuses();
    $registeredBusesArray = json_decode(json_encode($registeredBuses), true);
    return $registeredBusesArray;
    
    }

    public function generateBusSchedule($registeredBusesArray)
{
    // Initialize time slots and percentages
    $timeSlots = [
        '5.30 a.m. - 8.30 a.m.' => 0.4,
        '8.30 a.m. - 3.00 p.m.' => 0.2,
        '3.00 p.m. - 5.30 p.m.' => 0.3,
        '5.30 p.m. - 8.00 p.m.' => 0.1
    ];

    // Sort registered buses by starting place
    $startingPlace1Buses = [];
    $startingPlace2Buses = [];
    foreach ($registeredBusesArray as $bus) {
        if ($bus['start'] === 'Piliyandala') {
            $startingPlace1Buses[] = $bus;
        } elseif ($bus['start'] === 'Pettah') {
            $startingPlace2Buses[] = $bus;
        }
    }

    // Calculate the number of buses for each time slot based on percentages
    $schedule = [];
    foreach ($timeSlots as $timeSlot => $percentage) {
        $numBuses = ceil(count($registeredBusesArray) * $percentage);
        for ($i = 0; $i < $numBuses; $i++) {
            $bus = null;
            if ($i < $numBuses * 0.5) {
                // Assign bus from starting place 1
                $bus = array_shift($startingPlace1Buses);
            } elseif ($i < $numBuses * 0.7) {
                // Assign bus from starting place 2
                $bus = array_shift($startingPlace2Buses);
            } else {
                // Assign bus randomly from both starting places
                $bus = (rand(0, 1) === 0) ? array_shift($startingPlace1Buses) : array_shift($startingPlace2Buses);
            }

            if ($bus) {
                // Get start and destination from registeredBusesArray
                $start = $bus['start'];
                $destination = $bus['dest'];

                // Calculate departure and arrival time for the bus
                $departureTime = strtotime($timeSlot);
                $arrivalTime = strtotime('+1.5 hours', $departureTime);

                // Update bus details with start, destination, departure time, and arrival time
                $bus['start'] = $start;
                $bus['dest'] = $destination;
                $bus['departure_time'] = date('h:i a', $departureTime);
                $bus['arrival_time'] = date('h:i a', $arrivalTime);

                // Add bus to the schedule
                $schedule[$timeSlot][] = $bus;
                
            }
        }
    }

    return $schedule;
}


    
function assignBusesToTimeSlots($busesArray) {
    // Calculate the number of buses needed for each time slot
    $numBusesSlot1 = ceil(count($busesArray) * 0.3);
    $numBusesSlot2 = ceil(count($busesArray) * 0.2);
    $numBusesSlot3 = ceil(count($busesArray) * 0.1);
    $numBusesSlot4 = ceil(count($busesArray) * 0.3);
    $numBusesSlot5 = ceil(count($busesArray) * 0.1);

    // Assign the constant buses that run from 6.00 a.m. to 8.00 a.m. from A to B
    $schedule[] = array('bus' => "Constant Bus 1", 'from' => 'A', 'to' => 'B', 'arrival_time' => date_create('6:00 am'), 'departure_time' => date_create('7:00 am'));
    $schedule[] = array('bus' => "Constant Bus 2", 'from' => 'A', 'to' => 'B', 'arrival_time' => date_create('6:15 am'), 'departure_time' => date_create('7:15 am'));
    $schedule[] = array('bus' => "Constant Bus 3", 'from' => 'A', 'to' => 'B', 'arrival_time' => date_create('6:30 am'), 'departure_time' => date_create('7:30 am'));

    // Assign buses for slot 1 (6.00 a.m. to 8.00 a.m.)
    $nextDepartureTime = date_create('7:45 am');
    for ($i = 0; $i < $numBusesSlot1; $i++) {
        $arrivalTime = clone $nextDepartureTime;
        $departureTime = date_create_from_format('Y-m-d H:i:s', $nextDepartureTime->format('Y-m-d H:i:s'))->modify('+1 hour');
        $schedule[] = array('bus' => "Slot 1 Bus $i", 'from' => 'A', 'to' => 'B', 'arrival_time' => $arrivalTime, 'departure_time' => $departureTime);
        $returnDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+20 minutes');
        $schedule[] = array('bus' => "Slot 1 Bus $i", 'from' => 'B', 'to' => 'A', 'arrival_time' => $departureTime, 'departure_time' => $returnDepartureTime);
        $nextDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+15 minutes');
    }

    // Assign buses for slot 2 (8.00 a.m. to 1.00 p.m.)
    $nextDepartureTime = date_create('1:45 pm');
    for ($i = 0; $i < $numBusesSlot2; $i++) {
        $arrivalTime = clone $nextDepartureTime;
        $departureTime = date_create_from_format('Y-m-d H:i:s', $nextDepartureTime->format('Y-m-d H:i:s'))->modify('+1 hour');
        $schedule[] = array('bus' => "Slot 2 Bus $i", 'from' => 'A', 'to' => 'B',        'arrival_time' => $arrivalTime, 'departure_time' => $departureTime);
        $returnDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+20 minutes');
        $schedule[] = array('bus' => "Slot 3 Bus $i", 'from' => 'B', 'to' => 'A', 'arrival_time' => $departureTime, 'departure_time' => $returnDepartureTime);
        $nextDepartureTime = date_create_from_format('Y-m-d H:i:s', $returnDepartureTime->format('Y-m-d H:i:s'))->modify('+15 minutes');
    }

    // Assign buses for slot 4 (3.30 p.m. to 6.30 p.m.)
    $nextDepartureTime = date_create('7:15 pm');
    for ($i = 0; $i < $numBusesSlot4; $i++) {
        $arrivalTime = clone $nextDepartureTime;
        $departureTime = date_create_from_format('Y-m-d H:i:s', $nextDepartureTime->format('Y-m-d H:i:s'))->modify('+1 hour');
        $schedule[] = array('bus' => "Slot 4 Bus $i", 'from' => 'A', 'to' => 'B', 'arrival_time' => $arrivalTime, 'departure_time' => $departureTime);
        $returnDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+20 minutes');
        $schedule[] = array('bus' => "Slot 4 Bus $i", 'from' => 'B', 'to' => 'A', 'arrival_time' => $departureTime, 'departure_time' => $returnDepartureTime);
        $nextDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+15 minutes');
    }

    // Assign buses for slot 5 (6.30 p.m. to 8.30 p.m.)
    $nextDepartureTime = date_create('9:15 pm');
    for ($i = 0; $i < $numBusesSlot5; $i++) {
        $arrivalTime = clone $nextDepartureTime;
        $departureTime = date_create_from_format('Y-m-d H:i:s', $nextDepartureTime->format('Y-m-d H:i:s'))->modify('+1 hour');
        $schedule[] = array('bus' => "Slot 5 Bus $i", 'from' => 'A', 'to' => 'B', 'arrival_time' => $arrivalTime, 'departure_time' => $departureTime);
        $returnDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+20 minutes');
        $schedule[] = array('bus' => "Slot 5 Bus $i", 'from' => 'B', 'to' => 'A', 'arrival_time' => $departureTime, 'departure_time' => $returnDepartureTime);
        $nextDepartureTime = date_create_from_format('Y-m-d H:i:s', $departureTime->format('Y-m-d H:i:s'))->modify('+15 minutes');
    }

    // Return the final schedule
    return $schedule;
}


    
    
    


  
}
