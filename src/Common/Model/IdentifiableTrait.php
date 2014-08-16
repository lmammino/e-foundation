<?php

namespace LMammino\EFoundation\Common\Model;

/**
 * Trait IdentifiableTrait
 *
 * @package LMammino\EFoundation\Common\Model
 */
trait IdentifiableTrait
{
    /**
     * @var string $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
