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

}
