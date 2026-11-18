<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(): Response
    {
        $formations = [
            [
                'title' => 'Développement PHP',
                'description' => 'Découvrir le développement côté serveur.',
            ],
            [
                'title' => 'Symfony',
                'description' => 'Structurer une application web en PHP.',
            ],
            [
                'title' => 'JavaScript',
                'description' => 'Rendre les pages web interactives côté navigateur.',
            ],
            [
                'title' => 'Bases de données SQL',
                'description' => 'Concevoir et interroger une base de données relationnelle.',
            ],
            [
                'title' => 'Git et GitHub',
                'description' => 'Versionner son code et travailler en équipe.',
            ],
        ];

        return $this->render('home/index.html.twig', [
            'formations' => $formations,
        ]);
    }
}
