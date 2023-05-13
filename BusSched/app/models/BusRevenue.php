<?php

class BusRevenue extends Model
{
    protected $table = 'daily_bus_revenue';

    // editable columns

    protected $allowedColumns = [
        'id',
        'bus_no',
        'revenue',
        'date',
    ];




}

