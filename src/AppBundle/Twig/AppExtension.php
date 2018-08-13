<?php
/**
 * Created by PhpStorm.
 * User: Antonis
 * Date: 6/21/2018
 * Time: 11:07 PM
 */

namespace AppBundle\Twig;


use AppBundle\Repository\CategoryRepository;
use AppBundle\Repository\CountryRepository;
use AppBundle\Repository\LanguageRepository;
use AppBundle\Repository\PostRepository;
use AppBundle\Repository\YearRepository;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    private $locale;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var YearRepository
     */
    private $yearRepository;
    /**
     * @var LanguageRepository
     */
    private $languageRepository;
    /**
     * @var CountryRepository
     */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository,CategoryRepository $categoryRepository,YearRepository $yearRepository,LanguageRepository $languageRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->yearRepository = $yearRepository;
        $this->languageRepository = $languageRepository;
        $this->countryRepository = $countryRepository;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('price',[$this,'priceFilter'])
        ];
    }

    public function getGlobals()
    {
        $years =  $this->yearRepository->findAll();
        $countries =  $this->countryRepository->findAll();
        $categories =  $this->categoryRepository->findAll();
        $languages =  $this->languageRepository->findAll();


        return array(
            'years' => $years,
            'countries' => $countries,
            'categories' => $categories,
            'languages' => $languages,

        );
    }




}