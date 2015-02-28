<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 28/02/15
 * Time: 16:02
 */

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

class Product
{

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", name="id_product")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="description")
     */
    protected $description;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", mappedBy="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="category")
     */
    protected $category;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="User", inversedBy="products")
     * @ORM\JoinTable(name="products_users")
     **/
    protected $users;

    /**
     * @var Location
     *
     * @ORM\OneToOne(targetEntity="Location", mappedBy="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="location")
     */
    protected $location;

    /**
     * @ORM\Column(type="date", name="date_post")
     */
    protected $date;

    /**
     * @ORM\Column(type="decimal", name="price")
     */
    protected $price;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


}