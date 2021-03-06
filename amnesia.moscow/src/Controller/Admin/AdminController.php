<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Partner;
use App\Entity\Product;
use App\Entity\Website;
use App\Form\UserFormType;
use App\Entity\Announcement;
use App\Form\ProductFormType;
use App\Service\EmailService;
use App\Entity\CatalogCategory;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use App\Form\CatalogCategoryFormType;
use App\Repository\ArticleRepository;
use App\Repository\PartnerRepository;
use App\Repository\ProductRepository;
use App\Repository\WebsiteRepository;
use App\Repository\FeedBackRepository;
use App\Form\WebsiteManagementFormType;
use App\Repository\AnnouncementRepository;
use App\Repository\CatalogCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CustomSeasonalBlockRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
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
     * @Route("/admin/products/all", name="admin_all_products")
     */
    public function allProducts(Request $request, ProductRepository $productRepository)
    {
        $id = $request->get('id');
        $products = $productRepository->findAll();

        foreach ($products as $product) {
            $status = $product -> getIsProductOfTheWeek();
        }

        if ($id) {
            $products = $productRepository->findAll();
            foreach ($products as $product) {
                $product->setIsProductOfTheWeek(0);
            }
            $product = $productRepository->findOneBy(array('id' => $id));
            $product->setIsProductOfTheWeek(1);
    
    
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        }

        return $this->render('admin/all_products.html.twig', ['status' => $status, 'products' => $products]);
    }
    


    /**
     * @Route("/admin/products/add", name="admin_add_products")
     */
    public function addProducts(Request $request, ProductRepository $productRepository)
    {

        $color = $request->get('color');
        if ($color != NULL) {
            $product = new Product();
           // $product = $productRepository->findOneBy([], ['id' => 'desc']);
            $product->setColor($color);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
    
        }

        $shape = $request->get('shape');
        if ($shape != NULL) {
            $product = $productRepository->findOneBy([], ['id' => 'desc']);
            $product->setShape($shape);
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        }

        $gender = $request->get('gender');
        if ($gender != NULL) {
            $product = $productRepository->findOneBy([], ['id' => 'desc']);
            $product->setForGender($gender);
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        }


        $form = $this->createForm(ProductFormType::class);
        $form->remove('isProductOfTheWeek');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $product = $productRepository->findOneBy([], ['id' => 'desc']);
        $title = $form["title"]->getData();
        $description = $form["description"]->getData();
        $smallDescription = $form["smallDescription"]->getData();
        $reference = $form["reference"]->getData();
        $price = $form["price"]->getData();
        $newPrice = $form["newPrice"]->getData();
        $inStock = $form["inStock"]->getData();
        $image = $form["imageFile"]->getData();
        $titleEng = $form["titleEng"]->getData();
        $descriptionEng = $form["descriptionEng"]->getData();
        $priceEng = $form["priceEng"]->getData();
        $newPriceEng = $form["newPriceEng"]->getData();
        $catalogCategory = $form["catalogCategory"]->getData();

        $product->setTitle($title);
        $product->setDescription($description);
        $product->setDescription($description);
        $product->setSmallDescription($smallDescription);
        $product->setReference($reference);
        $product->setPrice($price);
        $product->setNewPrice($newPrice);
        $product->setInStock($inStock);
        $product->setImageFile($image);
        $product->setTitleEng($titleEng);
        $product->setDescriptionEng($descriptionEng);
        $product->setPriceEng($priceEng);
        $product->setNewPriceEng($newPriceEng);
        $product->setCatalogCategory($catalogCategory);
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

}

        return $this->render('admin/add_products.html.twig', [
        'form' => $form->createView()
        ]);
}

    /**
     * Deletes a Product.
     *
     * @Route("/admin/product/{id<\d+>}/delete", name="admin_product_delete")
     */
    public function productDelete(Product $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Товар успешно удален");

        return $this->redirectToRoute('admin_all_products');
    }

    /**
     * @Route("/admin/categories/all", name="admin_all_categories")
     */
    public function allCategories()
    {
        return $this->render('admin/all_categories.html.twig');
    }


    /**
     * @Route("/admin/add-categories", name="admin_add_categories")
     */
    public function addCategories()
    {
        return $this->render('admin/add_categories.html.twig');
    }

    /**
     * @Route("/admin/catalog-categories/all", name="admin_all_catalog_categories")
     */
    public function allCatalogCategories(Request $request, CatalogCategoryRepository $catalogCategoryRepository)
    {
        $catalogCategory = new CatalogCategory();
        $catalogCategories = $catalogCategoryRepository->findAll();

        $form = $this->createForm(CatalogCategoryFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $catalogCategory = $form -> getData();
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
     * Deletes a Category.
     *
     * @Route("/admin/catalog-categories/{id<\d+>}/delete", name="admin_catalog_categories_delete")
     */
    public function catalogCategoryDelete(CatalogCategory $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Категория каталога успешно удалена");

        return $this->redirectToRoute('admin_all_catalog_categories');
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

        $form = $this->createForm(UserFormType::class);
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
     * Deletes a User.
     *
     * @Route("/admin/users/{id<\d+>}/delete", name="admin_user_delete")
     */
    public function userDelete(User $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Пользователь успешно удален");

        return $this->redirectToRoute('admin_users');
    }



    /**
     * @Route("/admin/website-management/home-page", name="website_management_home_page")
     */
    public function websiteManagementHomePage(Request $request, WebsiteRepository $websiteRepository, CustomSeasonalBlockRepository $customSeasonalBlocksRepository, PartnerRepository $partnerRepository, AnnouncementRepository $announcementRepository, FeedBackRepository $feedBackRepository)
    {

        if($websiteRepository->findAll() != null) {
            $website = $websiteRepository->findOneBy([], ['id' => 'desc']);
        }else {
            $website = new Website();
        }

        $partners = $partnerRepository -> findAll();
        $customSeasonalBlocks = $customSeasonalBlocksRepository -> findAll();
        $announcements = $announcementRepository -> findAll();
        $feedbacks = $feedBackRepository -> findAll();

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
            'partners' => $partners,
            'customSeasonalBlocks' => $customSeasonalBlocks,
            'announcements' => $announcements,
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Deletes a Announcement.
     *
     * @Route("/admin/partner/{id<\d+>}/delete", name="admin_partner_delete")
     */
    public function partnerDelete(Partner $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Партнер успешно удален");

        return $this->redirectToRoute('website_management_home_page');
    }


    /**
     * Deletes a Announcement.
     *
     * @Route("/admin/announcement/{id<\d+>}/delete", name="admin_announcement_delete")
     */
    public function announcementDelete(Announcement $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Новость успешно удалена");

        return $this->redirectToRoute('website_management_home_page');
    }


    /**
     * @Route("/admin/blog-all-articles", name="blog_all_articles")
     */
    public function BlogHome(ArticleRepository $articleRepository)
    {

        $articles = $articleRepository -> findAll();
        return $this->render('admin/blog_all_articles.html.twig', [
            'articles' => $articles
        ]);
    }


    /**
     * @Route("/admin/blog-add-article", name="blog_add_article")
     */
    public function BlogAddArticle(ArticleRepository $articleRepository)
    {

        $articles = $articleRepository -> findAll();
        return $this->render('admin/blog_add_article.html.twig', [
            'articles' => $articles
        ]);
    }


    /**
     * Deletes aт Article.
     *
     * @Route("/admin/article/{id<\d+>}/delete", name="admin_article_delete")
     */
    public function articleDelete(Article $data): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('success', "Статья успешно удалена");

        return $this->redirectToRoute('blog_all_articles');
    }
    
}