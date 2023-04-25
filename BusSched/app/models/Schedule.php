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

function generate_bus_schedule($registered_buses)
{
    // Calculate the total number of buses
    $total_buses = count($registered_buses);

    // Initialize variables for time slots and departure times
    $slot1_buses = intval($total_buses * 0.2);
    $slot2_buses = intval($total_buses * 0.3);
    $slot3_buses = intval($total_buses * 0.3);
    $slot4_buses = $total_buses - $slot1_buses - $slot2_buses - $slot3_buses;
    $bus_schedule = array();

    // Generate bus schedule for time slot 1
    $slot_start_time = DateTime::createFromFormat('H:i a', '8:00 AM');
    $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
    for ($i = 0; $i < $slot1_buses; $i++) {
        // Check if departure time exceeds time slot
        if ($slot_start_time >= DateTime::createFromFormat('H:i a', '10:00 AM')) {
            // Update the time slot and reset the departure time
            $slot_start_time = DateTime::createFromFormat('H:i a', '8:00 AM');
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }

        // Add the current bus to the bus schedule
        $bus_schedule[] = array(
            'bus_no' => $registered_buses[$i]['bus_no'],
            'type' => $registered_buses[$i]['type'],
            'start_place' => $registered_buses[$i]['start'],
            'end_place' => $registered_buses[$i]['dest'],
            'arrival_time' => $slot_start_time->format('H:i a'),
            'departure_time' => $departure_time
        );

        // Update the departure time for the next bus
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
    }

    // Generate bus schedule for time slot 2
    $slot_start_time = DateTime::createFromFormat('H:i a', '10:00 AM');
    $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
    for ($i = $slot1_buses; $i < ($slot1_buses + $slot2_buses); $i++) {
        // Check if departure time exceeds time slot
        if ($slot_start_time >= DateTime::createFromFormat('H:i a', '12:00 PM')) {
            // Update the time slot and reset the departure time
            $slot_start_time = DateTime::createFromFormat('H:i a', '10:00 AM');
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }

        // Add the current bus to the bus schedule
        $bus_schedule[] = array(
            'bus_no' => $registered_buses[$i]['bus_no'],
            'type' => $registered_buses[$i]['type'],
            'start_place' => $registered_buses[$i]['start'],
            'end_place' => $registered_buses[$i]['dest'],
            'arrival_time' => $slot_start_time->format('H:i a'),
            'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        // Generate bus schedule for time slot 3
        $slot_start_time = DateTime::createFromFormat('H:i a', '12:00 PM');
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        for ($i = ($slot1_buses + $slot2_buses); $i < ($slot1_buses + $slot2_buses + $slot3_buses); $i++) {
            // Check if departure time exceeds time slot
            if ($slot_start_time >= DateTime::createFromFormat('H:i a', '2:00 PM')) {
                // Update the time slot and reset the departure time
                $slot_start_time = DateTime::createFromFormat('H:i a', '12:00 PM');
                $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
            }
    
            // Add the current bus to the bus schedule
            $bus_schedule[] = array(
                'bus_no' => $registered_buses[$i]['bus_no'],
                'type' => $registered_buses[$i]['type'],
                'start_place' => $registered_buses[$i]['start'],
                'end_place' => $registered_buses[$i]['dest'],
                'arrival_time' => $slot_start_time->format('H:i a'),
                'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        // Generate bus schedule for time slot 4
        $slot_start_time = DateTime::createFromFormat('H:i a', '2:00 PM');
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        for ($i = ($slot1_buses + $slot2_buses + $slot3_buses); $i < $total_buses; $i++) {
            // Check if departure time exceeds time slot
            if ($slot_start_time >= DateTime::createFromFormat('H:i a', '4:00 PM')) {
                // Update the time slot and reset the departure time
                $slot_start_time = DateTime::createFromFormat('H:i a', '2:00 PM');
                $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
            }
    
            // Add the current bus to the bus schedule
            $bus_schedule[] = array(
                'bus_no' => $registered_buses[$i]['bus_no'],
                'type' => $registered_buses[$i]['type'],
                'start_place' => $registered_buses[$i]['start'],
                'end_place' => $registered_buses[$i]['dest'],
                'arrival_time' => $slot_start_time->format('H:i a'),
                'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        return $bus_schedule;
    }

    function generate_bus_schedule1($registered_buses) {
        $total_buses = count($registered_buses);
        $slot1_buses = 0;
        $slot2_buses = 0;
        $slot3_buses = 0;
        $bus_schedule = array();
    
        // Count the number of buses registered for each time slot
        foreach ($registered_buses as $bus) {
            switch ($bus['time_slot']) {
                case 'slot1':
                    $slot1_buses++;
                    break;
                case 'slot2':
                    $slot2_buses++;
                    break;
                case 'slot3':
                    $slot3_buses++;
                    break;
                default:
                    // Handle unknown time slot value
                    break;
            }
        }
    
        // Generate bus schedule for time slot 1
        $slot_start_time = DateTime::createFromFormat('H:i a', '8:00 AM');
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        for ($i = 0; $i < $slot1_buses; $i++) {
            // Check if departure time exceeds time slot
            if ($slot_start_time >= DateTime::createFromFormat('H:i a', '10:00 AM')) {
                // Update the time slot and reset the departure time
                $slot_start_time = DateTime::createFromFormat('H:i a', '8:00 AM');
                $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
            }
    
            // Add the current bus to the bus schedule
            $bus_schedule[] = array(
                'bus_no' => isset($registered_buses[$i]['bus_no']) ? $registered_buses[$i]['bus_no'] : 'N/A',
                'type' => isset($registered_buses[$i]['type']) ? $registered_buses[$i]['type'] : 'N/A',
                'start_place' => isset($registered_buses[$i]['start']) ? $registered_buses[$i]['start'] : 'N/A',
                'end_place' => isset($registered_buses[$i]['dest']) ? $registered_buses[$i]['dest'] : 'N/A',
                'arrival_time' => $slot_start_time->format('H:i a'),
                'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        // Generate bus schedule for time slot 2
        $slot_start_time = DateTime::createFromFormat('H:i a', '10:00 AM');
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        for ($i = $slot1_buses; $i < ($slot1_buses + $slot2_buses); $i++) {
            // Check if departure time exceeds time slot
            if ($slot_start_time >= DateTime::createFromFormat('H:i a', '12:00 PM')) {
                // Update the time slot and reset the departure time
                $slot_start_time = DateTime::createFromFormat('H:i a', '10:00 AM');
                $departure_time= $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
            }
    
            // Add the current bus to the bus schedule
            $bus_schedule[] = array(
                'bus_no' => isset($registered_buses[$i]['bus_no']) ? $registered_buses[$i]['bus_no'] : 'N/A',
                'type' => isset($registered_buses[$i]['type']) ? $registered_buses[$i]['type'] : 'N/A',
                'start_place' => isset($registered_buses[$i]['start']) ? $registered_buses[$i]['start'] : 'N/A',
                'end_place' => isset($registered_buses[$i]['dest']) ? $registered_buses[$i]['dest'] : 'N/A',
                'arrival_time' => $slot_start_time->format('H:i a'),
                'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        // Generate bus schedule for time slot 3
        $slot_start_time = DateTime::createFromFormat('H:i a', '12:00 PM');
        $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        for ($i = ($slot1_buses + $slot2_buses); $i < $total_buses; $i++) {
            // Check if departure time exceeds time slot
            if ($slot_start_time >= DateTime::createFromFormat('H:i a', '2:00 PM')) {
                // Update the time slot and reset the departure time
                $slot_start_time = DateTime::createFromFormat('H:i a', '12:00 PM');
                $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
            }
    
            // Add the current bus to the bus schedule
            $bus_schedule[] = array(
                'bus_no' => isset($registered_buses[$i]['bus_no']) ? $registered_buses[$i]['bus_no'] : 'N/A',
                'type' => isset($registered_buses[$i]['type']) ? $registered_buses[$i]['type'] : 'N/A',
                'start_place' => isset($registered_buses[$i]['start']) ? $registered_buses[$i]['start'] : 'N/A',
                'end_place' => isset($registered_buses[$i]['dest']) ? $registered_buses[$i]['dest'] : 'N/A',
                'arrival_time' => $slot_start_time->format('H:i a'),
                'departure_time' => $departure_time
            );
    
            // Update the departure time for the next bus
            $departure_time = $slot_start_time->add(new DateInterval('PT1H15M'))->format('H:i a');
        }
    
        return $bus_schedule;
    }
    
    
    
    


  
}
