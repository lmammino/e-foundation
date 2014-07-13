<?php

namespace LMammino\EFoundation\Model\Address;

use Doctrine\Common\Collections\Collection;

/**
 * Interface ZoneInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface ZoneInterface
{
    /**
     * Type constants
     */
    const TYPE_COUNTRY = 'country';
    const TYPE_PROVINCE = 'province';
    const TYPE_ZONE = 'zone';

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set string
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

    /**
     * Set type
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type);

    /**
     * Get members
     *
     * @return Collection|ZoneMemberInterface[]
     */
    public function getMembers();

    /**
     * Set members
     *
     * @param Collection $members
     *
     * @return $this
     */
    public function setMembers(Collection $members);

    /**
     * Add zone member
     *
     * @param ZoneMemberInterface $member
     *
     * @return $this
     */
    public function addMember(ZoneMemberInterface $member);

    /**
     * Check if has a specific zone member
     *
     * @param ZoneMemberInterface $member
     *
     * @return boolean
     */
    public function hasMember(ZoneMemberInterface $member);

    /**
     * Removes a given zone member
     *
     * @param ZoneMemberInterface $member
     *
     * @return $this
     */
    public function removeMember(ZoneMemberInterface $member);

} 