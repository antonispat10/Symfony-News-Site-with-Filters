<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Year;
use AppBundle\Repository\CategoryRepository;
use AppBundle\Repository\CountryRepository;
use AppBundle\Repository\LanguageRepository;
use AppBundle\Repository\PostRepository;
use AppBundle\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Post;
use AppBundle\Entity\Category;
use AppBundle\Entity\Country;
use AppBundle\Entity\Language;




class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var LanguageRepository
     */
    private $languageRepository;
    /**
     * @var CountryRepository
     */
    private $countryRepository;
    /**
     * @var YearRepository
     */
    private $yearRepository;
    /**
     * @var FlashBagInterface
     */
    private $flashBag;

    public function __construct(PostRepository $postRepository,CategoryRepository $categoryRepository,LanguageRepository $languageRepository,
        CountryRepository $countryRepository, YearRepository $yearRepository,FlashBagInterface $flashBag)
    {

        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
        $this->countryRepository = $countryRepository;
        $this->yearRepository = $yearRepository;

        $this->flashBag = $flashBag;
    }

    /**
     * @Route("/", name="posts_index")
     */
    public function getPostsAction() {

        $posts = $this->postRepository->findAll();

        $html = $this->render('posts/index.html.twig', [
            'posts' => $posts
        ]);

        return new Response($html);
    }

    /**
     * @Route("/posts/year/{id}", name="post_by_year")
     */
    public function getPostsbyYearAction(Year $year) {

        $posts = $this->postRepository->findBy(['year'=>$year->getId()]);

        $html = $this->render('posts/posts_by_year.html.twig', [
            'posts' => $posts
        ]);

        return new Response($html);
    }

    /**
     * @Route("/posts/country/{id}", name="post_by_country")
     */
    public function getPostsbyCountryAction(Country $country) {
        $posts = $this->postRepository->findBy(['country'=>$country->getId()]);

        $html = $this->render('posts/posts_by_country.html.twig', [
            'posts' => $posts
            ]);

        return new Response($html);
    }

    /**
     * @Route("/posts/category/{id}", name="post_by_category")
     */
    public function getPostsbyCategoryAction(Category $category) {

        $posts = $this->postRepository->findBy(['category'=>$category->getId()]);

        $html = $this->render('posts/posts_by_category.html.twig', [
            'posts' => $posts
        ]);

        return new Response($html);
    }

    /**
     * @Route("/posts/language/{id}", name="post_by_language")
     */
    public function getPostsbyLanguageAction(Language $language) {

        $posts = $this->postRepository->findBy(['language'=>$language->getId()]);

        $html = $this->render('posts/posts_by_language.html.twig', [
            'posts' => $posts
        ]);

        return new Response($html);
    }

    /**
     * @Route("search/posts", name="search_post_action")
     */
    public function postSearchbyTitleAction(Request $request) {

        $posts = $this->postRepository->findAll();

        $search_input = $request->request->get('searchable');

        foreach($posts as $index=> $p){

            if(strlen($search_input) >= 2){
                if(strpos($p->getTitle(), $search_input) !==false || strpos($p->getTitle(), $search_input) !==false  ){

                    $pos = $this->postRepository->findOneBy(['id'=>$p->getId()]);


                    $search_posts[] = $pos;

                }
            }




        }

        if (!empty($posts)){

            $html = $this->render('posts/posts_search.html.twig', [
                'posts' => $search_posts
            ]);

            return new Response($html);

        } else{

            $html = $this->render('posts/index.html.twig', [
                'posts' => $posts
            ]);

            return new Response($html);

        }

        $search_posts = '';


    }


}
