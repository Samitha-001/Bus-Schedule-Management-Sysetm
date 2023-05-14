<?php

class Schedule extends Model
{
    protected $table = 'schedule';

    // editable columns
    protected $allowedColumns = [
        'id',
        'from_start',
        'bus_no',
        'departure',
        'arrival',
        'date'
    ];

    

    public function validate($data)
{
    $this->errors = [];

    foreach ($data as $item) {
        if (empty($item['bus_no'])) {
            $this->errors[] = "bus_no is required";
        } 
        
        if (empty($item['starting_place'])) {
            $this->errors[] = "starting_place is required";
        }
        
        if (empty($item['departure_time'])) {
            $this->errors[] = "departure time is required";
        }
        
        if (empty($item['arrival_time'])) {
            $this->errors[] = "arrival time is required";
        }
    }

    if (empty($this->errors)) {
        return true;
    }else{
        return false;
    }

    
}


    public function generateSchedule()
    {
    $reg_bus = new Bus();
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

    function divideBusesforA($buses){
        $Piliyandala_Buses = array();
        $Pettah_Buses = array();
        
        foreach ($buses as $bus) {
            if ($bus['start'] == "Piliyandala") {
                $Piliyandala_Buses[] = $bus['bus_no'];
            } 
        }
    return $Piliyandala_Buses;
}
    function divideBusesforB($buses){
        $Pettah_Buses = array();
        
        foreach ($buses as $bus) {
            if ($bus['start'] == "Pettah") {
                $Pettah_Buses[] = $bus['bus_no'];
            } 
        }
    return $Pettah_Buses;
}

function availableBuses(){
    $b = new Bus();
    $buses = $b->getBuses();
    $bs = json_decode(json_encode($buses), true);
    return $bs;
}
    

function schedule(){

    // $b = new Bus();
    // $buses = $b->getBuses();
    $bs = $this->availableBuses();

    $startTime = strtotime('05:30:00');
    $endTime = strtotime('20:30:00');
    $interval = 600;
    $travelTime = 3600;
    $aName = 'Piliyandala';
    $bName = 'Pettah';
    $busesOfA = [];
    $busesOfB = [];

    // Divide buses based on start key value
    foreach ($bs as $bus) {
        if ($bus['start'] === $aName) {
            $busesOfA[] = $bus['bus_no'];
        } else {
            $busesOfB[] = $bus['bus_no'];
        }
    }

    $successSchedule = '';
    for ($i = 60; $i > 0; $i--) {
        $interval = $i * 60;
        $possible = true;
        $currentSchedule = '';
        $currentTime = $startTime;
        $busesInA = $busesOfA;
        $busesInB = $busesOfB;
        $inTransitAB = [];
        $inTransitBA = [];

        while ($currentTime <= $endTime) {
            $currentSchedule .= 'Current time: '. date('H:i', $currentTime) . PHP_EOL;
            $removableBusesA = [];
            $removableBusesB = [];

            foreach ($inTransitAB as $bus => $arrivalTime) {
                if ($arrivalTime <= $currentTime) {
                    $removableBusesA[] = $bus;
                }
            }

            foreach ($removableBusesA as $bus) {
                unset($inTransitAB[$bus]);
                $busesInB[] = $bus;
            }

            foreach ($inTransitBA as $bus => $arrivalTime) {
                if ($arrivalTime <= $currentTime) {
                    $removableBusesB[] = $bus;
                }
            }

            foreach ($removableBusesB as $bus) {
                unset($inTransitBA[$bus]);
                $busesInA[] = $bus;
            }

            if (count($busesInA) != 0) {
                $departA = $busesInA[array_rand($busesInA)];
                $currentSchedule .= $departA .' departs '. $aName .' at '. date('H:i', $currentTime) . PHP_EOL;
                $busesInA = array_values(array_diff($busesInA, [$departA]));
                $inTransitAB[$departA] = $currentTime + $travelTime;
            } else {
                $possible = false;
                break;
            }

            if (count($busesInB) != 0) {
                $departB = $busesInB[array_rand($busesInB)];
                $currentSchedule .= $departB .' departs '. $bName .' at '. date('H:i', $currentTime) . PHP_EOL;
                $busesInB = array_values(array_diff($busesInB, [$departB]));
                $inTransitBA[$departB] = $currentTime + $travelTime;
            } else {
                $possible = false;
                break;
            }

            $currentTime += $interval;
        }

        if (!$possible) {
            $interval = ($i + 1) * 60;
            break;
        }

        $successSchedule = $currentSchedule;
    }

    $optimal_time =  (floor($interval / 60));
    return $optimal_time;
}

    function busSchedule($buses, $currentDate) {
        

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
        // $departure_time_from_Piliyandala = $departure_time_day;
        // $departure_time_from_Pettah = $departure_time_day;
        $arrival_time = strtotime('+1 hour', $departure_time_day);

       
        
        $schedule = array();
        $id = 0;
        // $day_start_time = strtotime($time_slots[0]['start_time']);
        // $day_end_time = strtotime($time_slots[2]['end']);
    
                
                
                $last_departed_piliyandala_bus = $departure_time_day;
                $last_departed_pettah_bus = $departure_time_day;

                while($last_departed_piliyandala_bus <= (strtotime('20:30')) && $last_departed_pettah_bus <= (strtotime('20:30'))){
                    if ($last_departed_piliyandala_bus <= (strtotime('20:30'))) {
                        // check which time slot we are in
                        if ($last_departed_piliyandala_bus >= strtotime($time_slots[0]['start_time']) && $last_departed_piliyandala_bus <= strtotime($time_slots[0]['end'])) {
                            $num_buses = $time_slots[0]['num_buses'];
                            $time_between_buses = $this->schedule();
                        } elseif ($last_departed_piliyandala_bus >= strtotime($time_slots[1]['start_time']) && $last_departed_piliyandala_bus <= strtotime($time_slots[1]['end'])) {
                            $num_buses = $time_slots[1]['num_buses'];
                            $time_between_buses = $this->schedule()*2;
                        } else {
                            $num_buses = $time_slots[2]['num_buses'];
                            $time_between_buses = $this->schedule();
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
                                'starting_place' => $starting_place,
                                'date' => $currentDate
                            );
                    
                            // calculate next departure time
                            $last_departed_piliyandala_bus = strtotime('+' . $time_between_buses . ' minutes', $last_departed_piliyandala_bus);
    
                            $bus['start'] = 'Pettah';
                            $bus['dest'] = 'Piliyandala';
                            array_push($Pettah_Buses, $bus);
                        }
                    }
                    
                    if ($last_departed_pettah_bus <= (strtotime('20:30'))) {
                        // check which time slot we are in
                        if ($last_departed_pettah_bus>= strtotime($time_slots[0]['start_time']) && $last_departed_pettah_bus <= strtotime($time_slots[0]['end'])) {
                            $num_buses = $time_slots[0]['num_buses'];
                            $time_between_buses = $this->schedule();
                        } elseif ($last_departed_pettah_bus >= strtotime($time_slots[1]['start_time']) && $last_departed_pettah_bus <= strtotime($time_slots[1]['end'])) {
                            $num_buses = $time_slots[1]['num_buses'];
                            $time_between_buses = $this->schedule()*2;
                        } else {
                            $num_buses = $time_slots[2]['num_buses'];
                            $time_between_buses = $this->schedule();
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
                                'starting_place' => $starting_place,
                                'date' => $currentDate
                            );
                    
                            // calculate next departure time
                            $last_departed_pettah_bus = strtotime('+' . $time_between_buses . ' minutes', $last_departed_pettah_bus);
    
                            $bus['start'] = 'Piliyandala';
                            $bus['dest'] = 'Pettah';
                            array_push($Piliyandala_Buses, $bus);
                        }
                    }
                }
                
return $schedule;
    }
    

   function nextDaySchedule(){
        // $this-> busSchedule($this->availableBuses() ,$nextday);
        return "Hey" ;
   }
    
    

   
}


