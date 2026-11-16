<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    private $name;
    private $age;
    private $city;

    #[Route('/profil/{name}', name: 'app_profil')]
    public function profile(string $name): Response
    {
        $this->name = $name;
        $this->age = 28;
        $this->city = "Toulouse";
        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'name' => $this->name,
            'age' => $this->age,
            'city' => $this->city,
        ]);
    }
}
