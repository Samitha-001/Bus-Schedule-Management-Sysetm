<?php

class Point extends Model
{
    protected $table = 'points';

    // editable columns

    protected $allowedColumns = [
        'id',
        'points_from',
        'points_to',
        'amount'
    ];

    // record point gifting
    // TODO: add updating points of users
    public function giftPoints($data)
    {
        $amount = $data['amount'];
        $passenger = new Passenger();

        // deduct points from gifter
        $gifter = $passenger->first(['username' => $data['points_from']]);
        $gifterPoints = $gifter->points - $amount;
        $passenger->updatePassenger($gifter->username, ['points' => $gifterPoints]);

        // add points to giftee
        $giftee = $passenger->first(['username' => $data['points_to']]);
        $gifteePoints = $giftee->points + $amount;
        $passenger->updatePassenger($giftee->username, ['points' => $gifteePoints]);

        return $this->insert($data);
    }
}
