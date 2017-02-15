<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var ArrayCollection
     * One Category have Many Entries.
     * @ORM\OneToMany(targetEntity="EntryTag", mappedBy="idTag")
     *
     */
    /**
     * @var \Entry
     * Many Tag have Many Entry.
     * @ORM\ManyToMany(targetEntity="Entry")
     * @ORM\JoinTable(name="entry_tag",
     *      joinColumns={@ORM\JoinColumn(name="id_tag", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_entry  ", referencedColumnName="id")}
     *      )
     */
    protected $entry;

    public function __construct()
    {
        $this->entry = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tag
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param Entry $entry
     * @return $this
     */
    public function setEntry(Entry $entry)
    {
        $this->entry = $entry;
        return $this;
    }
}
