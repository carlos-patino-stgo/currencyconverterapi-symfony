<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConversionsController extends AbstractController
{
    /**
     * @Route("/conversions", name="conversions.conversions")
     */
    public function conversions(): Response
    {
        return $this->render('conversions/index.html.twig', [
            'controller_name' => 'ConversionsController',
        ]);
    }
}
