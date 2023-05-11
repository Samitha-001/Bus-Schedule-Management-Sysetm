<?php

class Route extends Model
{
    protected $table = 'route';

    // editable columns
    protected $allowedColumns = [
        'id',
        'route_id',
        'source',
        'destination',
        'avg_speed',
        'busy_speed'
    ];

    // get speed
    public function getSpeed($route_id, $hour)
    {
        $route = $this->first(['route_id' => $route_id]);
        if($hour == 'busy') {
            return $route->busy_speed;
        }
        else {
            return $route->avg_speed;
        }
    }
    
}