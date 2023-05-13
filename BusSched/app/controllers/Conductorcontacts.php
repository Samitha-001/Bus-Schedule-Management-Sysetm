<?php
class Conductorcontacts
{

    use Controller;

    public function index()
    {
        $user = new User();
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
        $this->userview('conductor', 'contacts', $data);
    }

}