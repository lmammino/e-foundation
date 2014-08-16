<?php

namespace LMammino\EFoundation\Address\Model;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use LMammino\EFoundation\Common\Model\IdentifiableTrait;

/**
 * Class Zone
 *
 * @package LMammino\EFoundation\Address\Model
 */
class Zone implements ZoneInterface
{
    use IdentifiableTrait;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $type
     */
    protected $type;

    /**
     * @var \Doctrine\Common\Collections\Collection $members
     */
    protected $members;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * {@inheritDoc}
     */
    public function setMembers(Collection $members)
    {
        foreach ($members as $member) {
            $this->addMember($member);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addMember(ZoneMemberInterface $member)
    {
        if (!$this->members->contains($member)) {
            $member->setParentZone($this);
            $this->members->add($member);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasMember(ZoneMemberInterface $member)
    {
        return $this->members->contains($member);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMember(ZoneMemberInterface $member)
    {
        if ($this->members->contains($member)) {
            $member->setParentZone(null);
            $this->members->removeElement($member);
        }

        return $this;
    }
}
