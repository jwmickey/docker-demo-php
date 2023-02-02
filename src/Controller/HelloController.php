<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    const DEFAULT_NAME = 'World';

    #[Route('/hello/{name}')]
    public function name($name = self::DEFAULT_NAME): Response
    {
        return $this->render('hello/name.html.twig', [
            'name' => ucwords($name)
        ]);
    }
}