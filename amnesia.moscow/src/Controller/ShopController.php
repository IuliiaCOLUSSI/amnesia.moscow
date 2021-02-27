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
use App\Repository\FeedBackRepository;
use App\Repository\PurchaseRepository;
use App\Repository\AnnouncementRepository;
use App\Repository\CatalogCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ShopController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function Home(Request $request, ProductRepository $productRepository, WebsiteRepository $websiteRepository, CatalogCategoryRepository $catalogCategoryRepository, AnnouncementRepository $announcementRepository, PartnerRepository $partnerRepository, UserPasswordEncoderInterface $encoder, FeedBackRepository $feedBackRepository)
    {
        $user = new User;

        $userId = $user->getId();
        
        $password = "Amnesia" . date('ymd') . rand(1000, 9999);
        $encodedPassword = $encoder->encodePassword($user, $password);
        $user->setPassword($encodedPassword);

        $form1 = $this->createForm(UserFormType::class, $user);
        $form1->remove('lastName');
        $form1->remove('messageBody');
        $form1->handleRequest($request);

        $isProductOfTheWeek = $productRepository -> findOneBy(array('isProductOfTheWeek' => 1));


        if ($form1->isSubmitted() && $form1->isValid()) {
            $purchase = $form1 -> getData();
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($purchase);
            $em->flush();
    }

        $form2 = $this->createForm(UserFormType::class, $user);
        $form2->remove('lastName');
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $userQuestion = $form2 -> getData();

            $em->persist($userQuestion);
            $em->flush();
    }


        $lastWebsiteObject = $websiteRepository->findOneBy([], ['id' => 'desc']);
        $catalogCategories = $catalogCategoryRepository->findAll();
        $announcements = $announcementRepository -> findAll();
        $partners = $partnerRepository -> findAll();
        $feedbacks = $feedBackRepository -> findAll();




        return $this->render('shop/home.html.twig', [
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
            'website' => $lastWebsiteObject,
            'catalogCategories' => $catalogCategories,
            'announcements' => $announcements,
            'partners' => $partners,
            'isProductOfTheWeek' => $isProductOfTheWeek,
            'feedbacks' => $feedbacks

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


    /**
     * @Route("/catalog/{slug}", name="product_card")
     */
    public function ProductCard(Product $product, ProductRepository $productRepository, SessionInterface $session)
    {
        $cart = $session->get('cart', []);
            return $this->render('shop/product-card.html.twig', ['cart' => $cart, 'product' => $product, 'products' => $productRepository -> getSimilarProducts()]);
    }

    /**
     * @Route("/cart/add/{slug}", name="cart_add")
     */
    public function addToCartGrivna($slug, ProductRepository $productRepository, PurchaseRepository $purchaseRepository, SessionInterface $session, Request $request)
    {
            $operation = 'plus';
            $operation = 'minus';
            $purchaseReference = "DADA" . date('ymd') . rand(1000, 9999);

            $sessionId = session_id();
            $cart = $session->get('cart', []);
    
            $product = $productRepository->findBy(array('slug'=>$slug));
            foreach ($product as $prod) {
    
                $cart[] = [
                    'product' => $prod,
                    'quantity' => 1,
                    ];
        }
    
            $session->set('cart', $cart);
    
            return $this->redirectToRoute(
                'product_card',
                [   
                    'slug' => $slug,
                ]
            );
        }


}