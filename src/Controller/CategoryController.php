<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CategoryController extends AbstractController
{
    private const PRODUCTS_LIMIT = 3;

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/categories", name="categories")
     */
    public function indexAction(Request $request, PaginatorInterface $paginator): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        $products = $paginator->paginate(
            $this->getDoctrine()->getRepository(Product::class)->findBy([], ['id' => 'DESC']),
            $this->detectPageNumberByRequest($request),
            self::PRODUCTS_LIMIT,
        );

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/category/{categoryId}", name="category")
     */
    public function categoryAction(Request $request, PaginatorInterface $paginator): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        $productsByCategory = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findProductsByCategoryId($request->get('categoryId'));
        $products = $paginator->paginate(
            $productsByCategory,
            $this->detectPageNumberByRequest($request),
            self::PRODUCTS_LIMIT,
        );

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    private function detectPageNumberByRequest(Request $request): int
    {
        $pageNumber = empty($request->get('page')) ? 1 : $request->get('page');

        return $pageNumber;
    }
}
