<?php

namespace Hl\Testtalk\HlTesttalkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="Hl\Testtalk\HlTesttalkBundle\Entity\BookRepository")
 */
class Book {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=20)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="string", length=400)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="categories", type="string", length=100)
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=30)
     */
    private $image;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="new", type="boolean")
     */
    private $new;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Book
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Book
     */
    public function setLanguage($language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set categories
     *
     * @param string $categories
     * @return Book
     */
    public function setCategories($categories) {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return string 
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Book
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Get new
     *
     * @return boolean 
     */
    public function isNew() {
        return $this->new;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return Book
     */
    public function setNew($new) {
        $this->new = $new;

        return $this;
    }

}