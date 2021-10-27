<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Activity;
use App\Repository\ActivityRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ActivityRepository $activityRepository, UserRepository $userRepository): Response
    {

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'activities' => $activityRepository->findAll(),
            'users' => $userRepository,
        ]);
    }
}
