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

function generateBusSchedule1($registeredBuses, $date) {
    // Create an array to store the generated schedule
    $busSchedule = array();
    
    // Get the total number of registered buses
    $totalBuses = count($registeredBuses);
    
    // Calculate the number of buses for each time slot based on percentages
    $numBusesSlot1 = ceil($totalBuses * 0.4);
    $numBusesSlot2 = ceil($totalBuses * 0.2);
    $numBusesSlot3 = ceil($totalBuses * 0.3);
    $numBusesSlot4 = ceil($totalBuses * 0.1);
    
    // Get the start time of the first time slot
    $startTimeSlot1 = strtotime('5:30 AM', $date);
    
    // Loop through the registered buses
    foreach ($registeredBuses as $bus) {
      // Get the start and end points of the bus trip
      $start = $bus['start'];
      $end = $bus['dest'];
      
      // Calculate the time intervals for each time slot
      $timeSlot1Interval = 5400; // 1.5 hours in seconds
      $timeSlot2Interval = 21600; // 6 hours in seconds
      $timeSlot3Interval = 10800; // 3 hours in seconds
      $timeSlot4Interval = 9300; // 2.58 hours in seconds
      
      // Calculate the departure time and arrival time for each time slot
      for ($i = 0; $i < $numBusesSlot1; $i++) {
        $departureTime = date('H:i A', $startTimeSlot1);
        $arrivalTime = date('H:i A', $startTimeSlot1 + $timeSlot1Interval);
        
        // Add the bus trip to the bus schedule
        $busSchedule[] = array(
          'bus_no' => $bus['bus_no'],
          'start' => $start,
          'destination' => $end,
          'departure_time' => $departureTime,
          'arrival_time' => $arrivalTime
        );
        
        // Update the start time for the next bus in the same time slot
        $startTimeSlot1 += $timeSlot1Interval + 900; // Add 15 minutes (900 seconds)
      }
      
      for ($i = 0; $i < $numBusesSlot2; $i++) {
        $departureTime = date('H:i A', strtotime('8:30 AM', $date));
        $arrivalTime = date('H:i A', strtotime('8:30 AM', $date) + $timeSlot2Interval);
        
        $busSchedule[] = array(
          'bus_no' => $bus['bus_no'],
          'start' => $start,
          'destination' => $end,
          'departure_time' => $departureTime,
          'arrival_time' => $arrivalTime
        );
        
        $date += $timeSlot2Interval + 900; // Add 15 minutes (900 seconds)
      }
      
      for ($i = 0; $i < $numBusesSlot3; $i++) {
        $departureTime = date('H:i A', strtotime('3:00 PM', $date));
        $arrivalTime = date('H:i A', strtotime('3:00 PM', $date) + $timeSlot3Interval);
        
        $busSchedule[] = array(
          'bus_no' => $bus['bus_no'],
          'start' => $start,
          'destination' => $end,
          'departure_time' => $departureTime,
          'arrival_time' => $arrivalTime
        );
  
        $date += $timeSlot3Interval + 900; // Add 15 minutes (900 seconds)
      }
  
      for ($i = 0; $i < $numBusesSlot4; $i++) {
        $departureTime = date('H:i A', strtotime('5:30 PM', $date));
        $arrivalTime = date('H:i A', strtotime('5:30 PM', $date) + $timeSlot4Interval);
        
        $busSchedule[] = array(
          'bus_no' => $bus['bus_no'],
          'start' => $start,
          'destination' => $end,
          'departure_time' => $departureTime,
          'arrival_time' => $arrivalTime
        );
  
        $date += $timeSlot4Interval + 900; // Add 15 minutes (900 seconds)
      }
    }
  
    return $busSchedule;
  }
  
}
