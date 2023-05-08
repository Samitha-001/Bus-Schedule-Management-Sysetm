<?php

class Friends extends Model
{
    protected $table = 'friends';

    // editable columns

    protected $allowedColumns = [
        'id',
        'passenger',
        'friend'
    ];

    // function to get friends
    public function getFriends($passenger) {
        $friends = $this->where(['passenger' => $passenger]);
        $friendList = [];
        foreach ($friends as $friend) {
            $friendList[] = $friend->friend;
        }
        return $friendList;
    }

    // function to add friend
    public function addFriend($passenger, $friend) {
        $this->insert([
            'passenger' => $passenger,
            'friend' => $friend
        ]);
    }
}

