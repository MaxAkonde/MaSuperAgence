<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
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

        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $properties = $paginator->paginate(
                $this->repository->findAllVisibleQuery($search),
                $request->query->getInt('page', 1),
                12
        );
        return $this->render('property/index.html.twig', [
                    'properties' => $properties,
                    'form' => $form->createView()
        ]);
    }

    public function show(Property $property, string $slug): Response {

        if ($property->getSlug() !== $slug) {
            return $this->redirectToRoute('property.show', [
                        'id' => $property->getId(),
                        'slug' => $property->getSlug()
                            ], 301);
        }

        return $this->render('property/show.html.twig', [
                    'property' => $property
        ]);
    }

}
