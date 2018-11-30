<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Seat;
use App\Form\SeatFormType;

class SeatController extends AbstractController
{

    /**
     *
     * @Route("/seat/create", name="create_seat", methods={"GET", "POST"})
     */
    public function createSeat(Request $request)
    {
        $seat = new Seat();
        $form = $this->createForm(SeatFormType::class, $seat, [
            'standalone' => true
        ]);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($seat);
            $manager->flush();
            
            return $this->redirectToRoute('list_seats');
        }
        
        return $this->render('Seat/Create.html.twig', [
            'formObj' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/seat/list", name="list_seats")
     */
    public function showAll()
    {
        $repository = $this->getDoctrine()->getRepository(Seat::class);
        
        // look for *all* Product objects
        $seats = $repository->findAll();
        
        return $this->render('Seat/List.html.twig', ['seats' => $seats]);
        
    }
    
}
