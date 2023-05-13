<?php


class Schedbuses
{

    use Controller;

    public function index()
    {
        $bus = new Bus();
        $buses = $bus->getBuses();

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['bus_no'] = strtoupper($_POST['bus_no']);
            if ($bus->validate($_POST)) {
                $bus->insert($_POST);
                redirect('');
            }

            $data['errors'] = $bus->errors;
            if (isset($_POST['download'])) {
                // set headers for CSV download
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=buses.csv');
              
                // open output stream
                $output = fopen('php://output', 'w');
              
                // get buses data
                $buses = $bus->getBuses();
              
                // write headers to CSV file
                fputcsv($output, array_keys($buses[0]));
              
                // write data to CSV file
                foreach ($buses as $bus) {
                  fputcsv($output, $bus);
                }
              
                // close output stream
                fclose($output);
              
                // stop script execution
                exit;
              }
            
        }

        $this->view('schedulebus', ['buses' => $buses]);

        
            
        
    }
}
