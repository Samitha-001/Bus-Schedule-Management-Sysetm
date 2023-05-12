<?php

class Schedule extends Bus
{
    protected $table = 'schedule';

    // editable columns
    protected $allowedColumns = [
        'id',
        'from_start',
        'bus_no',
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


    function busSchedule($buses , $date) {
        

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
        $departure_time_from_Piliyandala = $departure_time_day;
        $departure_time_from_Pettah = $departure_time_day;
        $arrival_time = strtotime('+1 hour', $departure_time_day);

        $time_between_buses1 = round((strtotime($time_slots[0]['end']) - strtotime($time_slots[0]['start_time'])) / 60 / $time_slots[0]['num_buses']);
        $time_between_buses2 = round((strtotime($time_slots[1]['end']) - strtotime($time_slots[1]['start_time'])) / 60 / $time_slots[1]['num_buses']);
        $time_between_buses3 = round((strtotime($time_slots[2]['end']) - strtotime($time_slots[2]['start_time'])) / 60 / $time_slots[2]['num_buses']);
        
        
        $schedule = array();
        $id = 0;
        $day_start_time = strtotime($time_slots[0]['start_time']);
        $day_end_time = strtotime($time_slots[2]['end']);
    
                // assign first three buses of Piliyandala_Buses to time slot 1
                for ($i = 0; $i < 3; $i++) {
                    $bus = array_shift($Piliyandala_Buses);
                    $bus_no = $bus['bus_no'];
                    $starting_place = $bus['start'];
                    
                    // calculate departure and arrival time
                    $departure_time = date('H:i', $departure_time_day);
                    $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));
                    
                    // add to schedule array
                    $schedule[] = array(
                        'id' => ++$id,
                        'bus_no' => $bus_no,
                        'departure_time' => $departure_time,
                        'arrival_time' => $arrival_time,
                        'starting_place' => $starting_place
                    );
                    
                    // calculate next departure time
                    $departure_time_day = strtotime("+30 minutes", $departure_time_day);
                    $bus['start'] = 'Pettah';
                    $bus['dest'] = 'Piliyandala';
                    array_push($Pettah_Buses, $bus);
                }

        $departure_time_day = strtotime($time_slots[0]['start_time']);
        $arrival_time = strtotime('+1 hour', $departure_time_day);

                for ($i = 0; $i < 3; $i++) {
                    $bus = array_shift($Pettah_Buses);
                    $bus_no = $bus['bus_no'];
                    $starting_place = $bus['start'];
                    
                    // calculate departure and arrival time
                    $departure_time = date('H:i', $departure_time_day);
                    $arrival_time = date('H:i', strtotime('+1 hour', $departure_time_day));
                    
                    // add to schedule array
                    $schedule[] = array(
                        'id' => ++$id,
                        'bus_no' => $bus_no,
                        'departure_time' => $departure_time,
                        'arrival_time' => $arrival_time,
                        'starting_place' => $starting_place
                    );
                    
                    // calculate next departure time
                    $departure_time_day = strtotime("+30 minutes", $departure_time_day);
                    $bus['start'] = 'Piliyandala';
                    $bus['dest'] = 'Pettah';
                    array_push($Piliyandala_Buses, $bus);
                    
                }
                
                $last_departed_piliyandala_bus = $departure_time_day;
                $last_departed_pettah_bus = $departure_time_day;

                while ($last_departed_piliyandala_bus <= (strtotime('20:30'))) {
                    // check which time slot we are in
                    if (date('H:i', $last_departed_piliyandala_bus) >= $time_slots[0]['start_time'] && date('H:i', $last_departed_piliyandala_bus) <= $time_slots[0]['end']) {
                        $num_buses = $time_slots[0]['num_buses'];
                        $time_between_buses = $time_between_buses1;
                    } elseif (date('H:i', $last_departed_piliyandala_bus) >= $time_slots[1]['start_time'] && date('H:i', $last_departed_piliyandala_bus) <= $time_slots[1]['end']) {
                        $num_buses = $time_slots[1]['num_buses'];
                        $time_between_buses = $time_between_buses2;
                    } else {
                        $num_buses = $time_slots[2]['num_buses'];
                        $time_between_buses = $time_between_buses3;
                    }
                
                    // check if there are any buses left to schedule
                    if (count($Piliyandala_Buses) == 0) {
                        break;
                    }
                
                    // schedule buses for this time slot
                    for ($i = 0; $i < $num_buses; $i++) {
                        // check if there are any buses left to schedule
                        if (count($Piliyandala_Buses) == 0) {
                            break 2;
                        }
                
                        $bus = array_shift($Piliyandala_Buses);
                        $bus_no = $bus['bus_no'];
                        $starting_place = $bus['start'];
                
                        // calculate departure and arrival time
                        $departure_time = date('H:i', $last_departed_piliyandala_bus);
                        $arrival_time = date('H:i', strtotime('+' . 60 . ' minutes', $last_departed_piliyandala_bus));
                
                        // add to schedule array
                        $schedule[] = array(
                            'id' => ++$id,
                            'bus_no' => $bus_no,
                            'departure_time' => $departure_time,
                            'arrival_time' => $arrival_time,
                            'starting_place' => $starting_place
                        );
                
                        // calculate next departure time
                        $last_departed_piliyandala_bus = strtotime('+' . $time_between_buses . ' minutes', $last_departed_piliyandala_bus);

                        $bus['start'] = 'Pettah';
                        $bus['dest'] = 'Piliyandala';
                        array_push($Pettah_Buses, $bus);
                    }
                }
                
                while ($last_departed_pettah_bus <= strtotime('20:30')) {
                    // check which time slot we are in
                    if (date('H:i', $last_departed_pettah_bus) >= $time_slots[0]['start_time'] && date('H:i', $last_departed_pettah_bus) <= $time_slots[0]['end']) {
                        $num_buses = $time_slots[0]['num_buses'];
                        $time_between_buses = $time_between_buses1;
                    } elseif (date('H:i', $last_departed_pettah_bus) >= $time_slots[1]['start_time'] && date('H:i', $last_departed_pettah_bus) <= $time_slots[1]['end']) {
                        $num_buses = $time_slots[1]['num_buses'];
                        $time_between_buses = $time_between_buses2;
                    } else {
                        $num_buses = $time_slots[2]['num_buses'];
                        $time_between_buses = $time_between_buses3;
                    }
                
                    // check if there are any buses left to schedule
                    if (count($Pettah_Buses) == 0) {
                        break;
                    }
                
                    // schedule buses for this time slot
                    for ($i = 0; $i < $num_buses; $i++) {
                        // check if there are any buses left to schedule
                        if (count($Pettah_Buses) == 0) {
                            break 2;
                        }
                
                        $bus = array_shift($Pettah_Buses);
                        $bus_no = $bus['bus_no'];
                        $starting_place = $bus['start'];
                
                        // calculate departure and arrival time
                        $departure_time = date('H:i', $last_departed_pettah_bus);
                        $arrival_time = date('H:i', strtotime('+' . 60 . ' minutes', $last_departed_pettah_bus));
                
                        // add to schedule array
                        $schedule[] = array(
                            'id' => ++$id,
                            'bus_no' => $bus_no,
                            'departure_time' => $departure_time,
                            'arrival_time' => $arrival_time,
                            'starting_place' => $starting_place
                        );
                
                        // calculate next departure time
                        $last_departed_pettah_bus = strtotime('+' . $time_between_buses . ' minutes', $last_departed_pettah_bus);

                        $bus['start'] = 'Piliyandala';
                        $bus['dest'] = 'Pettah';
                        array_push($Piliyandala_Buses, $bus);
                    }
                }
                
return $schedule;
    }
    function sched(){
        $a_name = 'Piliyandala';
$b_name = 'Pettah';
$start_time = new DateTime('2023-05-12 05:30:00'); // 5:30 AM
$end_time = new DateTime('2023-05-12 20:30:00'); // 8:30 PM
$interval = new DateInterval('PT10M');
$travel_time = new DateInterval('PT1H');
$buses_of_a = array('A1', 'A2', 'A3');
$buses_of_b = array('B1', 'B2', 'B3', 'B4', 'B5');

$success_schedule = '';
for ($i = 60; $i > 0; $i--) {
    $interval = new DateInterval('PT' . $i . 'M');
    $possible = true;
    $current_schedule = '';
    $current_time = $start_time;
    $buses_in_a = $buses_of_a;
    $buses_in_b = $buses_of_b;
    $in_transit_a_b = array();
    $in_transit_b_a = array();
    while ($current_time <= $end_time) {
        $current_schedule .= 'Current time: ' . $current_time->format('H:i') . "\n";
        $removable_buses_a = array();
        $removable_buses_b = array();
        foreach ($in_transit_a_b as $bus => $arrival_time) {
            if ($arrival_time <= $current_time) {
                $removable_buses_a[] = $bus;
            }
        }
        foreach ($removable_buses_a as $bus) {
            unset($in_transit_a_b[$bus]);
            $buses_in_b[] = $bus;
        }
        foreach ($in_transit_b_a as $bus => $arrival_time) {
            if ($arrival_time <= $current_time) {
                $removable_buses_b[] = $bus;
            }
        }
        foreach ($removable_buses_b as $bus) {
            unset($in_transit_b_a[$bus]);
            $buses_in_a[] = $bus;
        }
        if (count($buses_in_a) != 0) {
            $depart_a = $buses_in_a[array_rand($buses_in_a)];
            $current_schedule .= $depart_a . ' departs ' . $a_name . ' at ' . $current_time->format('H:i') . "\n";
            unset($buses_in_a[array_search($depart_a, $buses_in_a)]);
            $in_transit_a_b[$depart_a] = $current_time->add($travel_time);
        } else {
            $possible = false;
            break;
        }
        if (count($buses_in_b) != 0) {
            $depart_b = $buses_in_b[array_rand($buses_in_b)];
            $current_schedule .= $depart_b . ' departs ' . $b_name . ' at ' . $current_time->format('H:i') . "\n";
            unset($buses_in_b[array_search($depart_b, $buses_in_b)]);
            $in_transit_b_a[$depart_b] = $current_time->add($travel_time);
        } else {
            $possible = false;
            break;
        }
        $current_time = $current_time->add($interval);
    }
    if (!$possible) {
        $interval = new DateInterval('PT' . ($i + 1) . 'M');
        break;
    }
    $success_schedule = $current_schedule;
    }
    return $interval->format('%i');
    }

    function findIntervalTime($a_name, $b_name, $start_time_str, $end_time_str, $interval_min, $buses_of_a, $buses_of_b) {
        $start_time = new DateTime($start_time_str);
        $end_time = new DateTime($end_time_str);
        $interval = new DateInterval("PT{$interval_min}M");
    
        $success_schedule = '';
        for ($i = 60; $i > 0; $i--) {
            $interval = new DateInterval("PT{$i}M");
            $possible = true;
            $current_schedule = '';
            $current_time = clone $start_time;
            $buses_in_a = $buses_of_a;
            $buses_in_b = $buses_of_b;
            $in_transit_a_b = [];
            $in_transit_b_a = [];
            
            while ($current_time <= $end_time) {
                $current_schedule .= 'Current time: ' . $current_time->format('H:i') . PHP_EOL;
                
                $removable_buses_a = [];
                $removable_buses_b = [];
                foreach ($in_transit_a_b as $bus => $arrival_time) {
                    if ($arrival_time <= $current_time) {
                        $removable_buses_a[] = $bus;
                    }
                }
                foreach ($removable_buses_a as $bus) {
                    unset($in_transit_a_b[$bus]);
                    $buses_in_b[] = $bus;
                }
                foreach ($in_transit_b_a as $bus => $arrival_time) {
                    if ($arrival_time <= $current_time) {
                        $removable_buses_b[] = $bus;
                    }
                }
                foreach ($removable_buses_b as $bus) {
                    unset($in_transit_b_a[$bus]);
                    $buses_in_a[] = $bus;
                }
                
                if (count($buses_in_a) > 0) {
                    $depart_a = $buses_in_a[array_rand($buses_in_a)];
                    $current_schedule .= "$depart_a departs $a_name at " . $current_time->format('H:i') . PHP_EOL;
                    unset($buses_in_a[array_search($depart_a, $buses_in_a)]);
                    $in_transit_a_b[$depart_a] = clone $current_time;
                    $in_transit_a_b[$depart_a]->add(new DateInterval("PT{$interval_min}M"));
                } else {
                    $possible = false;
                    break;
                }
                
                if (count($buses_in_b) > 0) {
                    $depart_b = $buses_in_b[array_rand($buses_in_b)];
                    $current_schedule .= "$depart_b departs $b_name at " . $current_time->format('H:i') . PHP_EOL;
                    unset($buses_in_b[array_search($depart_b, $buses_in_b)]);
                    $in_transit_b_a[$depart_b] = clone $current_time;
                    $in_transit_b_a[$depart_b]->add(new DateInterval("PT{$interval_min}M"));
                } else {
                    $possible = false;
                    break;
                }
                
                $current_time->add($interval);
            }
            
            if ($possible) {
                $success_schedule = $current_schedule;
                break;
            }
        }
        
        return $interval->i;
    }
    
    
    
}
