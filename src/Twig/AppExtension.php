<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    #[Route('/twig', name: 'app_twig')]
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

    public function index(Request $request): Response
    {
        return $this->render('twig/index.html.twig');
    }
}