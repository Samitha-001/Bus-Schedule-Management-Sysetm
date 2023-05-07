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




function generateSchedule1($buses, $date) {
    // Filter buses that are available on the specified date
    // $available_buses = array_filter($buses, function($bus) use ($date) {
    //   return in_array($date, $bus->availability);
    // });
        
    

    // Calculate number of buses for each time slot
    $total_buses = count($buses);
    $num_slot1 = ceil($total_buses * 0.25);
    $num_slot2 = ceil($total_buses * 0.5);
    $num_slot3 = $total_buses - $num_slot1 - $num_slot2;
  
    // Sort available buses by start time and type
    usort($buses, function($a, $b) {
      if ($a->start == $b->start) {
        return $a->type <=> $b->type;
      }
      return strtotime($a->start) <=> strtotime($b->start);
    });
  
    // Assign buses to time slots
    $assigned_buses = [];
    $time_slots = [
      ['start' => '5:30', 'end' => '8:30', 'num_buses' => $num_slot1, 'trip_time' => 60],
      ['start' => '8:30', 'end' => '17:30', 'num_buses' => $num_slot2, 'trip_time' => 45],
      ['start' => '17:30', 'end' => '20:30', 'num_buses' => $num_slot3, 'trip_time' => 60]
    ];
    $time = strtotime($time_slots[0]['start']);
    for ($i = 0; $i < 3; $i++) {
      $num_buses = $time_slots[$i]['num_buses'];
      $trip_time = $time_slots[$i]['trip_time'];
      $end_time = strtotime($time_slots[$i]['end']);
      for ($j = 0; $j < $num_buses; $j++) {
        $bus = array_shift($buses);
        $departure_time = date('H:i', $time);
        $arrival_time = date('H:i', $time + $trip_time * 60);
        $return_trip_start = date('H:i', strtotime($arrival_time) + 20 * 60);
        //20 needs to be variable
        $assigned_buses[] = [
          'bus_no' => $bus->bus_no,
          'start' => $bus->start,
          'departure_time' => $departure_time,
          'arrival_time' => $arrival_time
        ];
        if (strtotime($return_trip_start) < $end_time) {
          // Add return trip to the next available time slot
          array_push($buses, $bus);
          $time_slots[$i+1]['num_buses']++;
        }
        $time += 20 * 60;
      }
    }
  
    // Sort assigned buses by departure time
    usort($assigned_buses, function($a, $b) {
      return strtotime($a['departure_time']) <=> strtotime($b['departure_time']);
    });
  
    // Return schedule
    return $assigned_buses;
  }

  

  function generateBusSchedule($buses) {
    $total_buses = count($buses);
    $num_slot1 = ceil($total_buses * 0.25);
    $num_slot2 = floor($total_buses * 0.5);
    $num_slot3 = $total_buses - $num_slot1 - $num_slot2;
    
    $Piliyandala_Buses = array();
    $Pettah_Buses = array();
    
    foreach ($buses as $bus) {
        if ($bus['start'] == "Piliyandala") {
            $Piliyandala_Buses[] = $bus;
        } elseif ($bus['start'] == "Pettah") {
            $Pettah_Buses[] = $bus;
        }
    }
    
    $time_slots = [
        ['start' => '5:30', 'end' => '8:30', 'num_buses' => $num_slot1, 'trip_time' => 60],
        ['start' => '8:30', 'end' => '17:30', 'num_buses' => $num_slot2, 'trip_time' => 45],
        ['start' => '17:30', 'end' => '20:30', 'num_buses' => $num_slot3, 'trip_time' => 60]
    ];
    
    $schedule = array();
    
    foreach ($time_slots as $slot) {
        $current_time = strtotime($slot['start']);
        
        for ($i = 0; $i < $slot['num_buses']; $i++) {
            // For Piliyandala buses
            if ($i < count($Piliyandala_Buses)) {
                $bus = $Piliyandala_Buses[$i];
                $trip_time = isset($bus['trip_time']) ? $bus['trip_time'] : 60; // Set default trip time to 60 minutes if not provided
                $arrival_time = date('H:i', $current_time);
                $destination_time = date('H:i', strtotime("+$trip_time minutes", $current_time));
                $schedule[] = array(
                    'bus_no' => $bus['bus_no'],
                    'destination_time' => $destination_time,
                    'arrival_time' => $arrival_time,
                    'start' => $bus['start']
                );
                $current_time = strtotime("+$trip_time minutes", $current_time);
            }
            
            // For Pettah buses
            if ($i < count($Pettah_Buses)) {
                $bus = $Pettah_Buses[$i];
                $trip_time = isset($bus['trip_time']) ? $bus['trip_time'] : 60; // Set default trip time to 60 minutes if not provided
                $arrival_time = date('H:i', $current_time);
                $destination_time = date('H:i', strtotime("+$trip_time minutes", $current_time));
                $schedule[] = array(
                    'bus_no' => $bus['bus_no'],
                    'destination_time' => $destination_time,
                    'arrival_time' => $arrival_time,
                    'start' => $bus['start']
                );
                $current_time = strtotime("+$trip_time minutes", $current_time);
            }
        }
    }
    
    return $schedule;
    
}

// Helper function to add minutes to a given time and return the result in hh:mm format
function addMinutes($time, $minutes) {
    $date = strtotime("{$time} +{$minutes} minutes");
    return date('H:i', $date);
    }





    function generateBusSchedule4($buses) {
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
    
        $schedule = array();
    
        foreach ($time_slots as $slot) {
            $start_time = strtotime($slot['start_time']);
            $end_time = strtotime($slot['end']);
    
            $buses_remaining = $slot['num_buses'];
    
            for ($i = 0; $i < $slot['num_buses']; $i++) {
                if (count($Piliyandala_Buses) > 0 && count($Pettah_Buses) > 0) {
                    if ($i % 2 == 0) {
                        $bus = array_shift($Piliyandala_Buses);
                    } else {
                        $bus = array_shift($Pettah_Buses);
                    }
                } elseif (count($Piliyandala_Buses) > 0) {
                    $bus = array_shift($Piliyandala_Buses);
                } elseif (count($Pettah_Buses) > 0) {
                    $bus = array_shift($Pettah_Buses);
                } else {
                    break; // no more buses remaining
                }
    
                $bus_start_time = date("H:i", $start_time);
                $bus_end_time = date("H:i", strtotime("+$slot[trip_time] minutes", $start_time));
                $schedule[] = array('bus_no' => $bus['bus_no'], 'start' => $bus['start'], 'end' => $bus['dest'], 'start_time' => $bus_start_time, 'end_time' => $bus_end_time);
    
                $start_time = strtotime($bus_end_time);
    
                $buses_remaining--;
            }
    
            // schedule remaining buses in the slot
            while ($buses_remaining > 0) {
                if (count($Piliyandala_Buses) > 0 && count($Pettah_Buses) > 0) {
                    if ($buses_remaining % 2 == 0) {
                        $bus = array_shift($Piliyandala_Buses);
                    } else {
                        $bus = array_shift($Pettah_Buses);
                    }
                } elseif (count($Piliyandala_Buses) > 0) {
                    $bus = array_shift($Piliyandala_Buses);
                } elseif (count($Pettah_Buses) > 0) {
                $bus = array_shift($Pettah_Buses);
                } else {
                break; // no more buses remaining
                }
                $bus_start_time = date("H:i", $start_time);
                $bus_end_time = date("H:i", strtotime("+$slot[trip_time] minutes", $start_time));
                $schedule[] = array('bus_no' => $bus['bus_no'], 'start' => $bus['start'], 'end' => $bus['dest'], 'start_time' => $bus_start_time, 'end_time' => $bus_end_time);
        
                $start_time = strtotime($bus_end_time);
        
                $buses_remaining--;
            }
        }
        
        return $schedule;
        

     

}


}