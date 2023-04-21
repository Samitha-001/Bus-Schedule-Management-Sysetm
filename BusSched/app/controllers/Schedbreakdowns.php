<?php


class Schedbreakdowns
{

    use Controller;

    public function index()
    {
        $breakdown = new Breakdown();
        $breakdowns = $breakdown->getBreakdowns();

        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Check if a delete button was clicked
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
                // Call the delete method to delete the breakdown
                if ($breakdown->deleteBreakdown($id)) {
                    redirect('breakdowns');
                } else {
                    $data['error'] = 'Error deleting breakdown.';
                    echo $data['error'];
                }
            } 
        }
    
        $this->view('schedulebreakdown', ['breakdowns' => $breakdowns]);
    }

    
}
