<?php

class Passenger extends Model
{
    protected $table = 'passenger';

    protected $order_column = 'username';

    // editable columns
    protected $allowedColumns = [
        'username',
        'name',
        'phone',
        'address',
        'dob',
        'profile_pic',
        'points',
        'points_expiry'
    ];

    public function passengerInfo()
    {
        return $this->findAll();
    }

    // updatepassenger function
    public function updatePassenger($id, $data)
    {
        $this->update($id, $data, 'username');
    }

    // get passenger
    public function getPassenger($username)
    {
        $data = $this->where(['username'=>$username]);
        return $data;
    }

    // get passenger tickets
    public function getPassengerTickets()
    {
        $tablename = 'e_ticket';
        $tickets = $this->join($tablename, 'passenger.username', 'e_ticket.passenger', ['username'=>$_SESSION['USER']->username]);
        return $tickets;
    }
}
