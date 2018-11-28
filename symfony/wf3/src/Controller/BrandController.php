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
     * @Route("/brand/search", name="search_brand")
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

        $brands = $repository->findByName($pattern);

        return $this->json([
            'data' => $brands
        ]);
    }
}
