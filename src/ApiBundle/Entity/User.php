<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 28/02/15
 * Time: 16:36
 */

namespace ApiBundle\Entity;


class User
{

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


}