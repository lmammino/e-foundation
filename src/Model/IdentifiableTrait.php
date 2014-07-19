<?php

namespace LMammino\EFoundation\Model;

/**
 * Trait IdentifiableTrait
 *
 * @package LMammino\EFoundation\Model
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