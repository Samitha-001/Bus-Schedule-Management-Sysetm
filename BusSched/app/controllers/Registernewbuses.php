
<?php


class Registernewbuses
{

    use Controller;

    public function index()
    {
        $registernewbus = new Registernewbus();
        $registernewbuses = $registernewbus->getRegisternewbuses();
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {



            if ($registernewbus->validate($_POST)) {
                $registernewbus->insert($_POST);
                // redirect('registernew');
            }

            $data['errors'] = $registernewbus->errors;
        }

        $this->view('registernewbus', ['registernewbuses' => $registernewbuses]);
    }
}
