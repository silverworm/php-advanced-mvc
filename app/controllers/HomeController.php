<?php



namespace app\controllers;

/**
 *
 */
class HomeController
{

  public function viewAction(string $userName,$sads='asd')
  {
    // code...
    echo "Helo home page -- " . $userName . '<br>';
  }

  public function addAction()
  {
    // code...
    echo "Helo home page";
  }
}