<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('area', [$this, 'calculateArea']),
        ];
    }

    public function calculateArea(int $width, int $length): int
    {
        return $width * $length;
    }
    
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
    
        ]);
    }
}