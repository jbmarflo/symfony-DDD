<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntryTag
 *
 * @ORM\Table(name="entry_tag", indexes={@ORM\Index(name="fk_entry_tag_id_entry", columns={"id_entry"}), @ORM\Index(name="fk_entry_tag_id_tag", columns={"id_tag"})})
 * @ORM\Entity
 */
class EntryTag
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
     * @var \Entry
     *
     * @ORM\ManyToOne(targetEntity="Entry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entry", referencedColumnName="id")
     * })
     */
    private $idEntry;

    /**
     * @var \Tag
     *
     * @ORM\ManyToOne(targetEntity="Tag", inversedBy="entryTag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tag", referencedColumnName="id")
     * })
     */
    private $idTag;



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
     * Set idEntry
     *
     * @param \BlogBundle\Entity\Entry $idEntry
     *
     * @return EntryTag
     */
    public function setIdEntry(\BlogBundle\Entity\Entry $idEntry = null)
    {
        $this->idEntry = $idEntry;

        return $this;
    }

    /**
     * Get idEntry
     *
     * @return \BlogBundle\Entity\Entry
     */
    public function getIdEntry()
    {
        return $this->idEntry;
    }

    /**
     * Set idTag
     *
     * @param \BlogBundle\Entity\Tag $idTag
     *
     * @return EntryTag
     */
    public function setIdTag(\BlogBundle\Entity\Tag $idTag = null)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return \BlogBundle\Entity\Tag
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
