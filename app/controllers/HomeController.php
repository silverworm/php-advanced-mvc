<?php



namespace app\controllers;

/**
 * Class HomeController
 * @package app\controllers
 */
class HomeController
{

    /**
     * @param string $userName
     * @param string $sads
     */
    public function viewAction(string $userName, $sads='asd')
  {
    // code...
    echo "Helo home page -- " . $userName . '<br>';
  }

    /**
     *
     */
    public function addAction()
  {
    // code...
    echo "Helo home page";
  }
}