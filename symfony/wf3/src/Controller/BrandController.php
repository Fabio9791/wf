<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Brand;

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
}
