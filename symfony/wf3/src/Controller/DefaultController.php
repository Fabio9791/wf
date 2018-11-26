<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DTO\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Homepage
     * 
     * The homepage of the application
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="homepage")
     */
    public function homepage() 
    {
        $carList = [];
        
        $car1 = new Car();
        $car1->brand = 'Renault';
        $car1->color = 'grey';
        $car1->seats = ['front left', 'front right'];
        $car1->setModel('velsatis');
        
        $car2 = new Car();
        $car2->brand = 'Fiat';
        $car2->color = 'white';
        $car2->seats = ['back left', 'back right'];
        $car2->setModel('punto');
        
        array_push($carList, $car1);
        array_push($carList, $car2);
        
        return $this->render('homepage.html.twig',['cars'=>$carList]);
    }
}

