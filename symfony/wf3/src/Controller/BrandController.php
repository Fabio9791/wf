<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Brand;
use App\Form\BrandFormType;

class BrandController extends AbstractController
{

    /**
     *
     * @Route("/brand/search", name="search_brand", methods={"GET","OPTIONS"})
     */
    public function search(Request $request)
    {
        if (! $request->query->has('pattern')) {
            return new JsonResponse([
                'errors' => [
                    'Pattern must be specified'
                ]
            ], 400);
        }

        $manager = $this->getDoctrine()->getManager();
        $repository = $manager->getRepository(Brand::class);
        $pattern = $request->query->get('pattern');

        $brands = $repository->findByNameLike($pattern);

        $response = $this->json([
            'data' => $brands
        ]);
        
        if($request->getMethod() == 'OPTIONS'){
           $response->setContent(''); 
        }
           
        return $response;
    }
    
    /**
     *
     * @Route("/brand/create", name="create_brand", methods={"GET", "POST"})
     */
    public function createBrand(Request $request)
    {
        $brand = new Brand();
        $form = $this->createForm(BrandFormType::class, $brand, [
            'standalone' => true
        ]);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($brand);
            $manager->flush();
            
            return $this->redirectToRoute('list_brands');
        }
        
        return $this->render('Brand/Create.html.twig', [
            'formObj' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/brand/list", name="list_brands")
     */
    public function showAll()
    {
        $repository = $this->getDoctrine()->getRepository(Brand::class);
        
        // look for *all* Product objects
        $brands = $repository->findAll();
        
        return $this->render('Brand/List.html.twig', ['brands' => $brands]);
        
    }
    
    
}
