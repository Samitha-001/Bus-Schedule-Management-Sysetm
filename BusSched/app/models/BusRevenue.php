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

    /**
     * Description: returns total revenue of all buses for a given date range and given owner
     * @param $start_date
     * @param $end_date
     * @param $owner
     * @return array|false [object]:: bus_no, total, date
     *
     */
    public function getBusRevenue($start_date, $end_date,$owner):array|false{
        //format date
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        $sql = "SELECT daily_bus_revenue.bus_no,sum(revenue) as total,date FROM daily_bus_revenue INNER JOIN bus ON bus.bus_no=daily_bus_revenue.bus_no WHERE date BETWEEN ? AND ? AND owner=? GROUP BY daily_bus_revenue.bus_no";
        $data = [$start_date, $end_date,$owner];
        return $this->query($sql, $data);
    }




}

