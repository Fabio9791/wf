<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    
    /**
     * @Route("/car/create", name="create_car", methods={"GET", "POST"})
     */
    public function createCar()
    {
        return $this->render('Car/Create.html.twig');
    }
}

