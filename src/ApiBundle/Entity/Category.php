<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 28/02/15
 * Time: 16:02
 */

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\HasLifecycleCallbacks
* @ORM\Table(name="categorys")
*/
class Category
{

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", name="category_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="description")
     */
    protected $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}