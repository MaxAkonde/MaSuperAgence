<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of PropertyController
 *
 * @author barnabas
 */
class PropertyController extends AbstractController {

    private $repository;
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function index(PaginatorInterface $paginator, Request $request): Response {
        $properties = $paginator->paginate(
                $this->repository->findAllVisibleQuery(),
                $request->query->getInt('page', 1),
                12
        );
        return $this->render('property/index.html.twig', [
                    'properties' => $properties
        ]);
    }

    public function show() {
        return $this->render('property/index.html.twig');
    }

}
