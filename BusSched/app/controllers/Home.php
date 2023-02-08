<?php

class Home
{

  use Controller;

  public function index()
  {
    $halt = new Halt();
    $halts = $halt->getHalts();
    $data['halts'] = $halts;

    $data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
    $this->view('home', $data);
  }
}