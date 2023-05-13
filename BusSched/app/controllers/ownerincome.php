<?php

class ownerincome
{
    use Controller;

    public function index()
    {
        $data['revenue'] = (new BusRevenue())->getBusRevenue(date('Y-m-d',strtotime('last month')), date('Y-m-d'),$_SESSION['USER']->username);
        $this->userview('owner', 'ownerincome',$data);
    }

    /**
     * Description: API to return total revenue of all buses for a given date range and given owner
     */
    public function api_get_BusRevenue():void{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the POST data
            $postData = json_decode(file_get_contents('php://input'), true);
            $start_date = $postData['start_date'];
            $end_date = $postData['end_date'];
            $owner = $_SESSION['USER']->username;
            $busRevenue = new BusRevenue();
            $revenue = $busRevenue->getBusRevenue($start_date, $end_date,$owner);
            $response = array('status' => 'success', 'data' => $revenue);
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'data' => 'Invalid requestss');
            header('Content-Type: application/json');
            echo json_encode($response);
        }

    }
}
