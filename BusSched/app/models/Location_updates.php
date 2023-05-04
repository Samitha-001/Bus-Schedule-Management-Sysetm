<?php

class Location_updates extends Model
{
    protected $table = 'location_updates';

    // editable columns
    protected $allowedColumns = [
        'id',
        'username',
        'user_role',
        'ticket',
        'timestamp'
    ];

    // TODO function to add new location update record
}