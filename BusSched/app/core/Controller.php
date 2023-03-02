
<?php
// Generic function for all controllers to load the view

trait Controller
{
    // function to load the view
    public function view($name, $data = [])
    {
        if (!empty($data)) {
            extract($data);
        }

        $filename = "../app/views/" . $name . ".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }

    public function userview($user, $name, $data = [])
    {
        if (!empty($data)) {
            extract($data);
        }

        $filename = "../app/views/" . $user . "/" . $name . ".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}