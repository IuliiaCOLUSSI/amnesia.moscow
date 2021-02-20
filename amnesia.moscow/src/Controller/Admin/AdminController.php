<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Website;
use App\Form\ProductFormType;
use App\Service\EmailService;
use App\Entity\CatalogCategory;
use App\Form\InscriptionFormType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use App\Form\CatalogCategoryFormType;
use App\Repository\PartnerRepository;
use App\Repository\ProductRepository;
use App\Repository\WebsiteRepository;
use App\Form\WebsiteManagementFormType;
use App\Repository\CatalogCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AdminController extends AbstractController
{

    /**
     * @Route("/admin/statistics", name="admin_statistics")
     */
    public function statistics()
    {
        return $this->render('admin/statistics.html.twig');
    }

    /**
     * @Route("/admin/orders", name="admin_orders")
     */
    public function orders()
    {
        return $this->render('admin/orders.html.twig');
    }

    /**
     * @Route("/admin/all-products", name="admin_all_products")
     */
    public function allProducts(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();
        return $this->render('admin/all_products.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/admin/add-products", name="admin_add_products")
     */
    public function addProducts(Request $request)
    {

        $product = new Product();

        $form = $this->createForm(ProductFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
    }

        return $this->render('admin/add_products.html.twig', [
        'form' => $form->createView()
        ]);
}

    /**
     * @Route("/admin/all-categories", name="admin_all_categories")
     */
    public function allCategories()
    {
        return $this->render('admin/all_categories.html.twig');
    }

    /**
     * @Route("/admin/all-catalog-categories", name="admin_all_catalog_categories")
     */
    public function allCatalogCategories(Request $request, CatalogCategoryRepository $catalogCategoryRepository)
    {
        $catalogCategory = new CatalogCategory();
        $catalogCategories = $catalogCategoryRepository->findAll();

        $form = $this->createForm(CatalogCategoryFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogCategory);
            $em->flush();
    }

        return $this->render('admin/all_catalog_categories.html.twig', [
            'form' => $form->createView(),
            'catalogCategories' => $catalogCategories
        ]);
    }

    /**
     * @Route("/admin/add-categories", name="admin_add_categories")
     */
    public function addCategories()
    {
        return $this->render('admin/add_categories.html.twig');
    }


    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function inscription(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder, EmailService $emailService)
    {

        $allUsers = $userRepository->findAll();
        
        // Already connected
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_statistics');
        }

        $user = new User();

        $form = $this->createForm(InscriptionFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ExistingUser = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy(['email' =>
                $user->getEmail()]);

            if ($ExistingUser) {
                $this->addFlash('danger', 'Этот EMAIL уже использован. Данный пользователь уже получил письмо-приглашение. Пожалуйста, попросите его проверить папку "спам" или обратитесь за помощью к администратору сайта');
                //return $this->render('security/login.html.twig', ['form' => $form->createView()]);
            }

            $password = mt_rand();
            dump($password);
            $user->setPassword($password);
           // $encoded = $encoder->encodePassword($user, $password);
           // $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $userId = $user->getId();
            $email = $user->getEmail();
            $firstName = $user->getFirstName();

            $subject = 'Вас пригласили в проект "Amnesia';

            $send = $emailService->send(
                $email,
                $subject,
                $this->renderView(
                    'emails/inscription_confirmation.html.twig',
                    [
                        'firstName' => $firstName,
                        'userId' => $userId,
                    ]
                )
            );

            return $this->redirectToRoute('app_login');
        }

        return $this->render('admin/users.html.twig', [
            'form' => $form->createView(),
            'allUsers' => $allUsers
            ]);
    }


    /**
     * @Route("/admin/website-management/home-page", name="website_management_home_page")
     */
    public function websiteManagementHomePage(Request $request, WebsiteRepository $websiteRepository, PartnerRepository $partnerRepository)
    {

        if($websiteRepository->findAll() != null) {
            $website = $websiteRepository->findOneBy([], ['id' => 'desc']);
        }else {
            $website = new Website();
        }

        $partners = $partnerRepository -> findAll();
        $form = $this->createForm(WebsiteManagementFormType::class, $website);
        $form->handleRequest($request);
        //$website = $websiteRepository->findAll();
      /*  if ($website) {
            $website = new Website();
        } else {
            $website = new Website();
        }*/

        if ($form->isSubmitted() && $form->isValid()) {

            $website = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($website);
            $em->flush();

        }
        return $this->render('admin/website_management_home_page.html.twig', [
            'form' => $form->createView(),
            'website' => $website,
            'partners' => $partners
        ]);
    }
}