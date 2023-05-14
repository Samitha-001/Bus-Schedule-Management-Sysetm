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
        // validate if friend already added or friend is not the same as user
        if($friend != $passenger && !($this->where(['passenger' => $passenger, 'friend' => $friend]))) {
            // check if username is valid
            $passengers = new Passenger();
            if($passengers->where(['username' => $friend],'username')) {
                $this->insert([
                    'passenger' => $passenger,
                    'friend' => $friend
                ]);
            }
        };
    }

    // function to remove a friend
    public function removeFriend($passenger, $friend) {
        // find id of record
        $friends = new Friends();
        $friendID = $friends->first(['passenger' => $passenger, 'friend' => $friend])->id;
        $this->delete($friendID);
    }
}

