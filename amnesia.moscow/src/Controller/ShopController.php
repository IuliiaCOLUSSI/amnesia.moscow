<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;

use Symfony\Component\Mime\Email;
use App\Repository\WebsiteRepository;
use App\Repository\CatalogCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ShopController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function Home(WebsiteRepository $websiteRepository, CatalogCategoryRepository $catalogCategoryRepository)
    {
        $lastWebsiteObject = $websiteRepository->findOneBy([], ['id' => 'desc']);
        $catalogCategories = $catalogCategoryRepository->findAll();
        return $this->render('shop/home.html.twig', [
            'website' => $lastWebsiteObject,
            'catalogCategories' => $catalogCategories
        ]);
    }

    /**
     * @Route("/catalog", name="catalog")
     */
    public function Catalog()
    {
        return $this->render('shop/catalog.html.twig');
    }
}