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
        $data = $this->where(['username'=>$username], 'username');
        return $data;
    }

    // get passenger tickets
    public function getPassengerTickets()
    {
        $tablename = 'e_ticket';
        if (isset($_SESSION['USER']) && $_SESSION['USER']->role == 'passenger') {
            $tickets = $this->join($tablename, 'passenger.username', 'e_ticket.passenger', ['username' => $_SESSION['USER']->username]);
            return $tickets;
        }
        else {
            redirect('login');
        }
    }

    // get ratings by passenger
    public function getRatings()
    {
        $ratings = $this->join('ratings', 'passenger.username', 'ratings.rater', ['rater' => $_SESSION['USER']->username], 'ratings.ticket_id, ratings.bus_no, ratings.bus_rating, ratings.driver_rating, ratings.conductor_rating, ratings.time_updated');
        return $ratings;
    }
}
