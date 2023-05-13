<?php

class Halt extends Model
{
    protected $table = 'halt';

    // editable columns

    protected $allowedColumns = [
        'id',
        'route_id',
        'name',
        'distance_from_source',
        'fare_from_source'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['route_id'])) {
            $this->errors['route_id'] = "Please enter a route";
        } else
        if (empty($data['halt_name'])) {
            $this->errors['halt_name'] = "Halt name is required";
        } else
        if (empty($data['distance_from_source'])) {
            $this->errors['distance'] = "Enter distance from source";
        }
        else
        if (empty($data['fare_from_source'])) {
            $this->errors['fare'] = "Enter fare from source";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function getHalts()
    {
        return $this->findAll();
    }

    public function getHaltRange($src, $dest)
    {
        $halts = $this->findAll();
        $src = $this->first(['name' => $src])->id;
        $dest = $this->first(['name' => $dest])->id;
        $haltRange = [];
        if($src > $dest) {
            // reverse $halts list
            $halts = array_reverse($halts);
            // swap src and dest
            $temp = $src;
            $src = $dest;
            $dest = $temp;
        }
        foreach ($halts as $halt) {
            if ($halt->id >= $src && $halt->id <= $dest) {
                $haltRange[] = $halt->name;
            }
        }
        // $haltRange[] = $dest;
        return $haltRange;
    }

    public function addHalt($data)
    {
        $this->insert($data);
    }

    // function to delete a halt
    public function deleteHalt($id)
    {
        $this->delete($id);
    }

    // update halt
    public function updateHalt($id, $data)
    {
        return $this->update($id, $data);
    }

    // function to calculate the fare
    public function calculateFare($src, $dest)
    {
        $fi = new Fareinstance();
        $src = $this->first(['name' => $src]);
        $dest = $this->first(['name' => $dest]);
        return ($fi->first(['instance' => abs($src->distance_from_source - $dest->distance_from_source)])->fare);
    }
    
    // function to estimate time of arrival
    /**
     * Summary of estimateTime
     * @param mixed $src
     * @param mixed $dest
     * @param mixed $start_time {string['H:i:s'] 24 hour format}
     * @param mixed $hour {string['rush', 'normal']}
     * @return string
     */
    public function estimateTime($src, $dest, $start_time)
    {
        $route = new Route();
        $src = $this->first(['name' => $src]);
        $dest = $this->first(['name' => $dest]);
        // if start time is between 6am and 10am or 4pm and 8pm then rush hour else normal hour
        $hour = (date('H', strtotime($start_time)) >= 6 && date('H', strtotime($start_time)) <= 10) || (date('H', strtotime($start_time)) >= 16 && date('H', strtotime($start_time)) <= 20) ? 'rush' : 'normal';

        $speed = $route->getSpeed('120', $hour);
        $distance = abs($src->distance_from_source - $dest->distance_from_source);
        $duration = $distance / $speed;
        $start_time = strtotime($start_time);
        $duration = $duration * 60 * 60;
        $time_of_arrival = date('H:i:s', $start_time + $duration);
        return $time_of_arrival;
    }
}
