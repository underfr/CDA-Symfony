<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\UserService;

class UserController extends AbstractController
{
    private $name;
    private $age;
    private $city;
    public function __construct(private UserService $userService){

    }
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

    #[Route('/users', name: 'app_users')]
    public function getAllUsers(): Response
    {
        $users = $this->userService->getAllUsers();
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }
    #[Route('/users/{id}', name: 'app_user_show')]
    public function getOneUser(int $id): Response
    {
        $user = $this->userService->getUserById($id);
        return $this->render('user/show.html.twig', [
            'user' => $user
        ]);
    }
}
