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

    public function getavailablebuses()
    {
        $tablename = 'bus_availability';
        $buses = $this->join($tablename, 'bus.bus_no', 'bus_availability.bus_no');
        return $buses;
    }


    function busSchedule($buses) {
        $total_buses = count($buses);
        $num_slot1 = ceil($total_buses * 0.25);
        $num_slot2 = floor($total_buses * 0.5);
        $num_slot3 = $total_buses - $num_slot1 - $num_slot2;
        
        $Piliyandala_Buses = array();
        $Pettah_Buses = array();
        
        foreach ($buses as $bus) {
            if ($bus['start'] == "Piliyandala") {
                $Piliyandala_Buses[] = $bus;
            } elseif($bus['start'] == "Pettah") {
                $Pettah_Buses[] = $bus;
            }
        }
        
        $time_slots = [
            ['start_time' => '5:30', 'end' => '8:30', 'num_buses' => $num_slot1, 'trip_time' => 60],
            ['start_time' => '8:30', 'end' => '17:30', 'num_buses' => $num_slot2, 'trip_time' => 45],
            ['start_time' => '17:30', 'end' => '20:30', 'num_buses' => $num_slot3, 'trip_time' => 60]
        ];
        
        
        $departure_time_day = strtotime($time_slots[0]['start_time']);
        $arrival_time = strtotime('+1 hour', $departure_time_day);

        $time_between_buses1 = round((strtotime($time_slots[0]['end']) - strtotime($time_slots[0]['start_time'])) / 60 / $time_slots[0]['num_buses']);
        $time_between_buses2 = round((strtotime($time_slots[1]['end']) - strtotime($time_slots[1]['start_time'])) / 60 / $time_slots[1]['num_buses']);
        $time_between_buses3 = round((strtotime($time_slots[2]['end']) - strtotime($time_slots[2]['start_time'])) / 60 / $time_slots[2]['num_buses']);
        
        
        $schedule = array();
       
        $day_start_time = strtotime($time_slots[0]['start_time']);
        $day_end_time = strtotime($time_slots[2]['end']);
    
                // assign first three buses of Piliyandala_Buses to time slot 1
                for ($i = 0; $i < count($Piliyandala_Buses); $i++) {
                    $bus = array_shift($Piliyandala_Buses);
                    $bus_no = $bus['bus_no'];
                    $starting_place = $bus['start'];
                    
                    // calculate departure and arrival time
                    $departure_time = date('H:i', $departure_time_day);
                    $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));
                    
                    // add to schedule array
                    $schedule[] = array(
                        'bus_no' => $bus_no,
                        'departure_time' => $departure_time,
                        'arrival_time' => $arrival_time,
                        'starting_place' => $starting_place
                    );
                    
                    // calculate next departure time
                    $departure_time_day = strtotime("+{$time_between_buses1} minutes", $departure_time_day);
                    $bus['start'] = 'Pettah';
                    $bus['dest'] = 'Piliyandala';
                    array_push($Pettah_Buses, $bus);
                }

        $departure_time_day = strtotime($time_slots[0]['start_time']);
        $arrival_time = strtotime('+1 hour', $departure_time_day);

                for ($i = 0; $i < count($Pettah_Buses); $i++) {
                    $bus = array_shift($Pettah_Buses);
                    $bus_no = $bus['bus_no'];
                    $starting_place = $bus['start'];
                    
                    // calculate departure and arrival time
                    $departure_time = date('H:i', $departure_time_day);
                    $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));
                    
                    // add to schedule array
                    $schedule[] = array(
                        'bus_no' => $bus_no,
                        'departure_time' => $departure_time,
                        'arrival_time' => $arrival_time,
                        'starting_place' => $starting_place
                    );
                    
                    // calculate next departure time
                    $departure_time_day = strtotime("+{$time_between_buses1} minutes", $departure_time_day);
                    $bus['start'] = 'Piliyandala';
                    $bus['dest'] = 'Pettah';
                    array_push($Piliyandala_Buses, $bus);
                    
                }
                
                // Set the initial departure time based on the start time of the first time slot
$departure_time_day = strtotime($time_slots[0]['start_time']);

// Keep track of the last departed bus from both sides
$last_departed_piliyandala_bus = null;
$last_departed_pettah_bus = null;

// Schedule buses until the departure time reaches 8:30 p.m.
while (date('H:i', $departure_time_day) <= '20:30') {
    // Schedule Piliyandala buses
    if ($last_departed_piliyandala_bus === null || $departure_time_day >= $last_departed_piliyandala_bus) {
        // Check if there are any Piliyandala buses available to schedule
        if (!empty($Piliyandala_Buses)) {
            $bus = array_shift($Piliyandala_Buses);
            $bus_no = $bus['bus_no'];
            $starting_place = $bus['start'];

            // Calculate departure and arrival time
            $departure_time = date('H:i', $departure_time_day);
            $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));

            // Add to schedule array
            $schedule[] = array(
                'bus_no' => $bus_no,
                'departure_time' => $departure_time,
                'arrival_time' => $arrival_time,
                'starting_place' => $starting_place
            );

            // Calculate next departure time
            $departure_time_day = strtotime("+{$time_between_buses1} minutes", $departure_time_day);

            // Update bus start and destination places
            $bus['start'] = 'Pettah';
            $bus['dest'] = 'Piliyandala';

            // Add bus to the Pettah_Buses array
            array_push($Pettah_Buses, $bus);

            // Update last departed Piliyandala bus time
            $last_departed_piliyandala_bus = $departure_time_day;
        }
    }

    // Schedule Pettah buses
    if ($last_departed_pettah_bus === null || $departure_time_day >= $last_departed_pettah_bus) {
        // Check if there are any Pettah buses available to schedule
        if (!empty($Pettah_Buses)) {
            $bus = array_shift($Pettah_Buses);
            $bus_no = $bus['bus_no'];
            $starting_place = $bus['start'];

            // Calculate departure and arrival time
            $departure_time = date('H:i', $departure_time_day);
            $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));

            // Add to schedule array
            $schedule[] = array(
                'bus_no' => $bus_no,
                'departure_time' => $departure_time,
                'arrival_time' => $arrival_time,
                'starting_place' => $starting_place
            );

            // Calculate next departure time
            $departure_time_day = strtotime("+{$time_between_buses1} minutes", $departure_time_day);

            // Update bus start and destination places
            $bus['start'] = 'Piliyandala';
            $bus['dest'] = 'Pettah';

            // Add bus to the Piliyandala_Buses array
            array_push($Piliyandala_Buses, $bus);

                
                
                
                
               
            }
        
        
    }
    
    
    
    
    
    
    
    
}

return $schedule;
    }

    
}
// $departure_times[] = array();
// $arrival_times[] = array();
        // Time slot 1: 5:30 a.m. - 8:30 a.m.
// $departure_time = strtotime('5:30');
// $arrival_time = strtotime('+60 minutes', $departure_time);
// while($departure_time<strtotime('8:30')) {
//     $departure_times[] = date('H:i', $departure_time);
//     $departure_time = strtotime('+'.$time_between_buses1.' minutes', $departure_time);
//     $arrival_time = strtotime('+'.$time_slots[0]['trip_time'].' minutes', $departure_time);
//     $arrival_times[] = date('H:i', $arrival_time);

//     $schedule[] = array(
//         'departure_time' => $departure_times,
//         'arrival_time' => $arrival_times
//     );
// }

// // Time slot 2: 8:30 a.m. - 5:30 p.m.
// $departure_time = strtotime('8:30');
// $arrival_time = strtotime('+45 minutes', $departure_time);
// for ($i = 0; $i < $time_slots[1]['num_buses']; $i++) {
//     $departure_times[] = date('H:i', $departure_time);
//     $departure_time = strtotime('+'.$time_between_buses2.' minutes', $departure_time);
//     $arrival_time = strtotime('+'.$time_slots[1]['trip_time'].' minutes', $departure_time);
//     $arrival_times[] = date('H:i', $arrival_time);
//     $schedule[] = array(
//         'departure_time' => $departure_times,
//         'arrival_time' => $arrival_times
//     );
// }

// // Time slot 3: 5:30 p.m. - 8:30 p.m.
// $departure_time = strtotime('17:30');
// $arrival_time = strtotime('+60 minutes', $departure_time);
// for ($i = 0; $i < $time_slots[2]['num_buses']; $i++) {
//     $departure_times[] = date('H:i', $departure_time);
//     $departure_time = strtotime('+'.$time_between_buses3.' minutes', $departure_time);
//     $arrival_time = strtotime('+'.$time_slots[2]['trip_time'].' minutes', $departure_time);
//     $arrival_times[] = date('H:i', $arrival_time);
//     $schedule[] = array(
//         'departure_time' => $departure_times,
//         'arrival_time' => $arrival_times
//     );
// }