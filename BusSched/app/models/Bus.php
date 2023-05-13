<?php

class Bus extends Model
{
    protected $table = 'bus';

    // editable columns
    protected $allowedColumns = [
        'id',
        'bus_no',
        'type',
        'seats_no',
        'route',
        'rating',
        'no_of_reviews',
        'start',
        'dest',
        'owner',
        'conductor',
        'driver'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['bus_no'])) {
            $this->errors['bus_no'] = "Bus number is required";
        }
        if (empty($data['type'])) {
            $this->errors['type'] = "Choose bus type";
        }
        if (empty($data['seats_no'])) {
            $this->errors['seats_no'] = "Enter number of available seats";
        }
        if (empty($data['route'])) {
            $this->errors['route'] = "Enter bus route";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getBuses()
    {
        return $this->findAll();
    }

    public function getOwnerBuses($owner)
    {
        return $this->where(['owner' => $owner]);
    }

    public function getConductorBuses($conductor)
    {
        return $this->where(['conductor' => $conductor]);
    }

    public function deleteBus($id)
    {
        return $this->delete($id);
    }

    public function updateBus($id, $data)
    {
        return $this->update($id, $data);
    }

    // add new bus
    public function addBus($data)
    {
        // uppercase first 2 letters of bus number in data
        $data['bus_no'] = strtoupper(substr($data['bus_no'], 0, 2)) . substr($data['bus_no'], 2);
        echo $this->insert($data);
    }

    public function getBus($busno): object|false
    {
        return $this->first(['bus_no' => $busno]);
    }

    // function to get trips for a bus
    public function getTripsForBus($busno, $date)
    {
        $trip = new Trip();
        $trips = $trip->where(['bus_no' => $busno, 'trip_date' => $date]);
        return $trips;
    }

    // add function to get income of a bus on a day
    public function calculateDailyIncome($busno, $date)
    {
        $ticket = new E_ticket();
        $tripsForBus = $this->getTripsForBus($busno, $date);

        $income = 0;
        if($tripsForBus != null) {
            foreach ($tripsForBus as $trip) {
                $tickets = $ticket->where(['trip_id' => $trip->id]);
                
                if (!$tickets) {
                    continue;
                }
                foreach ($tickets as $tick) {
                $income += $tick->price;
                
            }
            }
        }
        return $income;
    }

    public function calculateTripIncome($tripno)
    {
        $ticket = new E_ticket();
        

        $income = 0;
     
           
                $tickets = $ticket->where(['trip_id' => $tripno]);
                if (!empty($tickets) && is_array($tickets) || is_object($tickets)) {
                foreach ($tickets as $tick) {
                $income += $tick->price;
                
            }

            }
        
        return $income;
    }


}
