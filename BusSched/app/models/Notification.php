<?php

class Notification extends Model
{
    protected $table = 'notifications';

    // editable columns
    protected $allowedColumns = [
        'id',
        'user',
        'status',
        'notification',
        'type'
    ];

    // get user notifications
    public function getUserNotifications($user, $type='')
    {
        if($type == '') {
            return $this->where(['user' => $user]);
        }
        return $this->where(['user' => $user, 'type' => $type]);
    }
}