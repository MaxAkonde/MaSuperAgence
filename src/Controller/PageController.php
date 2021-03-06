<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController {

    public function index(PropertyRepository $repository): Response {
        $properties = $repository->findLatest();
        return $this->render('pages/index.html.twig', [
            'current_menu' => 'home',
            'properties' => $properties
        ]);
    }

    public function about(): Response {
        return $this->render('pages/about.html.twig', [
            'current_menu' => 'about'
        ]);
    }

    public function agent(): Response {
        return $this->render('pages/agents.html.twig', [
            'current_menu' => 'agent'
        ]);
    }

    public function contact(): Response {
        return $this->render('pages/contact.html.twig', [
            'current_menu' => 'contact'
        ]);
    }

    public function blog(): Response {
        return $this->render('pages/blog.html.twig', [
            'current_menu' => 'blog'
        ]);
    }

}
