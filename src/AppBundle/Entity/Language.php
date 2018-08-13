<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Languages
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LanguageRepository")
 * @ORM\Table(name="languages")
 */
class Language
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="language_name", type="string", length=255, nullable=false)
     */
    private $languageName;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getLanguageName()
    {
        return $this->languageName;
    }

    /**
     * @param string $languageName
     */
    public function setLanguageName($languageName)
    {
        $this->languageName = $languageName;
    }




}

