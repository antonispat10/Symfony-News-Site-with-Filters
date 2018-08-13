<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Years
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\YearRepository")
 * @ORM\Table(name="years")
 */
class Year
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
     * @var integer
     *
     * @ORM\Column(name="year_name", type="integer", nullable=false)
     */
    private $yearName;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getYearName()
    {
        return $this->yearName;
    }

    /**
     * @param int $yearName
     */
    public function setYearName($yearName)
    {
        $this->yearName = $yearName;
    }




}

