<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;

use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ShopController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function Home()
    {
        return $this->render('shop/home.html.twig');
    }

    /**
     * @Route("/catalog", name="catalog")
     */
    public function Catalog()
    {
        return $this->render('shop/catalog.html.twig');
    }
}