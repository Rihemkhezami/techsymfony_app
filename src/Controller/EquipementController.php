<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class EquipementController extends AbstractController
{
    #[Route('/equipements', name: 'equipement_list')]

    public function list(EquipementRepository $equipementRepository): Response
    {
        $equipements=$equipementRepository->findAll();
        return $this->render('equipement/list.html.twig',['equipements'=>$equipements]);
    }


}
