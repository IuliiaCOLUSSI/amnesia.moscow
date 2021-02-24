<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;

use App\Entity\Purchase;
use App\Form\UserFormType;
use App\Entity\UserQuestion;
use App\Form\PurchaseFormType;
use Symfony\Component\Mime\Email;
use App\Form\UserQuestionFormType;
use App\Repository\PartnerRepository;
use App\Repository\ProductRepository;
use App\Repository\WebsiteRepository;
use App\Repository\AnnouncementRepository;
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
    public function Home(Request $request, WebsiteRepository $websiteRepository, CatalogCategoryRepository $catalogCategoryRepository, AnnouncementRepository $announcementRepository, PartnerRepository $partnerRepository, UserPasswordEncoderInterface $encoder)
    {
        $user = new User;
        
        $form1 = $this->createForm(UserFormType::class, $user);
        $form1->remove('lastName');
        $form1->remove('messageBody');
        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {
            $purchase = $form1 -> getData();

            $password = "Amnesia" . date('ymd') . rand(1000, 9999);
            $encodedPassword = $encoder->encodePassword($user, $password);
            $purchase->setPassword($encodedPassword);
            
            dump($purchase);
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchase);
            $em->flush();
    }

        $form2 = $this->createForm(UserFormType::class, $user);
        $form2->remove('lastName');
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $userQuestion = $form2 -> getData();

            $password = "Amnesia" . date('ymd') . rand(1000, 9999);
            $encodedPassword = $encoder->encodePassword($user, $password);
            $userQuestion->setPassword($encodedPassword);

            $em = $this->getDoctrine()->getManager();
            dump($userQuestion);
            $em->persist($userQuestion);
            $em->flush();
    }


        $lastWebsiteObject = $websiteRepository->findOneBy([], ['id' => 'desc']);
        $catalogCategories = $catalogCategoryRepository->findAll();
        $announcements = $announcementRepository -> findAll();
        $partners = $partnerRepository -> findAll();




        return $this->render('shop/home.html.twig', [
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
            'website' => $lastWebsiteObject,
            'catalogCategories' => $catalogCategories,
            'announcements' => $announcements,
            'partners' => $partners,

        ]);
    }

    /**
     * @Route("/catalog", name="catalog")
     */
    public function Catalog(Request $request, ProductRepository $productRepository, CatalogCategoryRepository $catalogCategoryRepository)
    {
        $catalogCategories = $catalogCategoryRepository->findAll();
        $products = $productRepository ->findBy(
            array(),
            array('price' => 'ASC')
        );

        return $this->render('shop/catalog.html.twig', [
            'products' => $products,
            'catalogCategories' => $catalogCategories,
        ]);
    }
}