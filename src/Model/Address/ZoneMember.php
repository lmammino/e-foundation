<?php


namespace LMammino\EFoundation\Model\Address;

/**
 * Class ZoneMember
 *
 * @package LMammino\EFoundation\Model\Address
 */
abstract class ZoneMember implements ZoneMemberInterface
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var ZoneMemberInterface $parentZone
     */
    protected $parentZone;

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
    public function getParentZone()
    {
        return $this->parentZone;
    }

    /**
     * {@inheritDoc}
     */
    public function setParentZone(ZoneInterface $parentZone = null)
    {
        $this->parentZone = $parentZone;

        return $this;
    }
}