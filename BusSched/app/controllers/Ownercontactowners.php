<?php
class Ownercontactowners
{

    use Controller;

    public function index()
    {
        $user = new user();

        // ownerContacts
        $ownerContacts = $user->getContactDetails('owner');
        // conductorContacts
        $conductorContacts = $user->getContactDetails('conductor');
        // driverContacts
        $driverContacts = $user->getContactDetails('driver');

        $data = [
            'ownerContacts' => $ownerContacts,
            'conductorContacts' => $conductorContacts,
            'driverContacts' => $driverContacts
        ];
     
        $this->userview('owner', 'ownercontactowner', ['data' => $data]);
    }

}