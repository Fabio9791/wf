<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Car;
use App\Form\CarFormType;
use Symfony\Component\HttpFoundation\Request;

class CarController extends Controller
{
    

    /**
     *
     * @Route("/car/create", name="create_car", methods={"GET", "POST"})
     */
    public function createCar(Request $request)
    {
        $car = new Car();
        $form = $this->createForm(CarFormType::class, $car, [
            'standalone' => true
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($car);
            $manager->flush();
            
            return $this->redirectToRoute('list_cars');
        }

        return $this->render('Car/Create.html.twig', [
            'formObj' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/cars/list", name="list_cars")
     */
    public function showAll()
    {
        $repository = $this->getDoctrine()->getRepository(Car::class);
        
        // look for *all* Product objects
        $cars = $repository->findAll();
        
        return $this->render('Car/List.html.twig', ['cars' => $cars]);
        
    }
}
