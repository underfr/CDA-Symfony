<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(private CategoryService $categoryService){

    }

    #[Route(path:'/categories', name: 'category_index')]
    public function showAllCategories(): Response
    {
        $categories = $this->categoryService->getCategories();
        return $this->render('category/show_all_categories.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route(path:'/category/{id}', name: 'category_show')]
    public function show(int $id): Response
    {
        $category = $this->categoryService->getCategoryById($id);
        return $this->render('category/show_category_by_id.html.twig', [
            'category' => $category
        ]);
    }

}
