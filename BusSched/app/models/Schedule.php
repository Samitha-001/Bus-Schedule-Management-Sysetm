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


    
function assignBusesToTimeSlots(array $buses, string $start, string $dest): array {
    // Filter buses based on start and destination
    $filteredBuses = array_filter($buses, function($bus) use ($start, $dest) {
        return $bus['start'] === $start && $bus['dest'] === $dest;
    });

    // Sort buses by type
    $sortedBuses = [];
    foreach ($filteredBuses as $bus) {
        $sortedBuses[$bus['type']][] = $bus;
    }

    // Calculate number of buses needed for each time slot
    $totalBuses = count($filteredBuses);
    $sixToEight = ceil(0.3 * $totalBuses);
    $eightToOne = ceil(0.2 * $totalBuses);
    $oneToThreeThirty = ceil(0.1 * $totalBuses);
    $threeThirtyToSixThirty = ceil(0.3 * $totalBuses);
    $sixThirtyToEightThirty = ceil(0.1 * $totalBuses);

    // Assign buses to time slots
    $schedule = [];
    $tripTime = new DateTime('6:00 AM');
    $returnTime = new DateTime('6:20 AM');
    foreach ($sortedBuses as $type => $buses) {
        $numBuses = count($buses);
        $sixToEightBuses = min($sixToEight, $numBuses);
        $eightToOneBuses = min($eightToOne, $numBuses - $sixToEightBuses);
        $oneToThreeThirtyBuses = min($oneToThreeThirty, $numBuses - $sixToEightBuses - $eightToOneBuses);
        $threeThirtyToSixThirtyBuses = min($threeThirtyToSixThirty, $numBuses - $sixToEightBuses - $eightToOneBuses - $oneToThreeThirtyBuses);
        $sixThirtyToEightThirtyBuses = min($sixThirtyToEightThirty, $numBuses - $sixToEightBuses - $eightToOneBuses - $oneToThreeThirtyBuses - $threeThirtyToSixThirtyBuses);

        // Assign buses to time slots
        for ($i = 0; $i < $sixToEightBuses; $i++) {
            $schedule[] = [
                'type' => $type,
                'bus_no' => $buses[$i]['bus_no'],
                'start' => $buses[$i]['start'],
                'dest' => $buses[$i]['dest'],
                'departure_time' => $tripTime->format('h:i A'),
                'arrival_time' => $tripTime->add(new DateInterval('PT1H'))->format('h:i A')
            ];
            $tripTime->add(new DateInterval('PT15M'));
        }
        for ($i = $sixToEightBuses; $i < $sixToEightBuses + $eightToOneBuses; $i++) {
            $schedule[] = [
                'type' => $type,
                'bus_no' => $buses[$i]['bus_no'],
                'start' => $buses[$i]['start'],
                'dest' => $buses[$i]['dest'],
                'departure_time' => $tripTime->format('h:i A'),
                'arrival_time' => $tripTime->add(new DateInterval('PT1H'))->format('h:i A')
                ];
                $tripTime->add(new DateInterval('PT15M'));
                }
                for ($i = $sixToEightBuses + $eightToOneBuses; $i < $sixToEightBuses + $eightToOneBuses + $oneToThreeThirtyBuses; $i++) {
                $schedule[] = [
                'type' => $type,
                'bus_no' => $buses[$i]['bus_no'],
                'start' => $buses[$i]['start'],
                'dest' => $buses[$i]['dest'],
                'departure_time' => $tripTime->format('h:i A'),
                'arrival_time' => $tripTime->add(new DateInterval('PT1H'))->format('h:i A')
                ];
                $tripTime->add(new DateInterval('PT15M'));
                }
                for ($i = $sixToEightBuses + $eightToOneBuses + $oneToThreeThirtyBuses; $i < $sixToEightBuses + $eightToOneBuses + $oneToThreeThirtyBuses + $threeThirtyToSixThirtyBuses; $i++) {
                $schedule[] = [
                'type' => $type,
                'bus_no' => $buses[$i]['bus_no'],
                'start' => $buses[$i]['start'],
                'dest' => $buses[$i]['dest'],
                'departure_time' => $tripTime->format('h:i A'),
                'arrival_time' => $tripTime->add(new DateInterval('PT1H'))->format('h:i A')
                ];
                $tripTime->add(new DateInterval('PT15M'));
                }
                for ($i = $sixToEightBuses + $eightToOneBuses + $oneToThreeThirtyBuses + $threeThirtyToSixThirtyBuses; $i < $numBuses; $i++) {
                $schedule[] = [
                'type' => $type,
                'bus_no' => $buses[$i]['bus_no'],
                'start' => $buses[$i]['start'],
                'dest' => $buses[$i]['dest'],
                'departure_time' => $tripTime->format('h:i A'),
                'arrival_time' => $tripTime->add(new DateInterval('PT1H'))->format('h:i A')
                ];
                $tripTime->add(new DateInterval('PT15M'));
                }
                }
                
                
                // Add return trips
                $returnTripTime = new DateTime('6:20 AM');
                foreach ($schedule as $bus) {
                    $returnTrip = [
                        'type' => $bus['type'],
                        'bus_no' => $bus['bus_no'],
                        'start' => $bus['dest'],
                        'dest' => $bus['start'],
                        'departure_time' => $returnTripTime->format('h:i A'),
                        'arrival_time' => $returnTripTime->add(new DateInterval('PT1H'))->format('h:i A')
                    ];
                    $schedule[] = $returnTrip;
                    $returnTripTime->add(new DateInterval('PT20M'));
                }
                
                return $schedule;

        
       
  
      
     
            }  
      
  
function generate_schedule($date, $buses) {
    $buses = json_decode(json_encode($buses), true);
  // Filter available buses for the given date
  $available_buses = array_filter($buses, function($bus) use ($date) {
    return in_array($date, $bus->availability);
  });

  // Sort available buses by availability time
  usort($available_buses, function($a, $b) {
    return strtotime($a->availability) - strtotime($b->availability);
  });

  // Create empty schedule array
  $schedule = [];

  // Calculate number of buses to assign to each time slot
  $num_buses = count($available_buses);
  $num_slot1 = ceil($num_buses * 0.3);
  $num_slot2 = ceil($num_buses * 0.2);
  $num_slot3 = ceil($num_buses * 0.1);
  $num_slot4 = ceil($num_buses * 0.3);
  $num_slot5 = $num_buses - ($num_slot1 + $num_slot2 + $num_slot3 + $num_slot4);

  // Assign buses to time slots
  $assigned_buses = [];
  $time_slots = [
    ['start' => '6:00', 'end' => '8:00', 'num_buses' => $num_slot1],
    ['start' => '8:00', 'end' => '13:00', 'num_buses' => $num_slot2],
    ['start' => '13:00', 'end' => '15:30', 'num_buses' => $num_slot3],
    ['start' => '15:30', 'end' => '18:30', 'num_buses' => $num_slot4],
    ['start' => '18:30', 'end' => '20:30', 'num_buses' => $num_slot5],
    ];







// Filter buses that meet the criteria for start and destination
$filtered_buses = array_filter($buses, function ($bus) {
return ($bus->start == 'Piliyandala' && $bus->dest == 'Pettah') || ($bus->start == 'Pettah' && $bus->dest == 'Piliyandala');
});

// Sort buses by availability
usort($filtered_buses, function ($a, $b) {
return $a->availability - $b->availability;
});

// Assign buses to time slots
foreach ($time_slots as $slot) {
$num_buses = $slot['num_buses'];
$buses_for_slot = array_slice($filtered_buses, 0, $num_buses);
$filtered_buses = array_slice($filtered_buses, $num_buses);


foreach ($buses_for_slot as $i => $bus) {
  $start_time = strtotime($slot['start']);
  $departure_time = date('H:i', $start_time + ($i * 20 * 60));
  $arrival_time = date('H:i', strtotime('+1 hour', strtotime($departure_time)));

  $assigned_buses[] = [
    'bus_no' => $bus->bus_no,
    'start' => $bus->start,
    'type' => $bus->type,
    'departure_time' => $departure_time,
    'arrival_time' => $arrival_time,
  ];
}
}

// Generate return trips for assigned buses
$return_trips = [];
foreach ($assigned_buses as $bus) {
$return_start_time = strtotime($bus['arrival_time']);
$return_departure_time = date('H:i', $return_start_time + 10 * 60);
$return_arrival_time = date('H:i', strtotime('+1 hour', strtotime($return_departure_time)));


$return_trips[] = [
  'bus_no' => $bus['bus_no'],
  'start' => $bus['start'] == 'Piliyandala' ? 'Pettah' : 'Piliyandala',
  'type' => $bus['type'],
  'departure_time' => $return_departure_time,
  'arrival_time' => $return_arrival_time,
];
}

// Merge assigned buses and return trips into a single schedule
$schedule = array_merge($assigned_buses, $return_trips);

// Sort schedule by departure time
usort($schedule, function ($a, $b) {
return strtotime($a['departure_time']) - strtotime($b['departure_time']);
});

// Format schedule with date
$formatted_schedule = [];
foreach ($schedule as $trip) {
$formatted_schedule[] = [
'date' => $date,
'bus_no' => $trip['bus_no'],
'start' => $trip['start'],
'type' => $trip['type'],
'departure_time' => $trip['departure_time'],
'arrival_time' => $trip['arrival_time'],
];
}

return $formatted_schedule;
}


}
