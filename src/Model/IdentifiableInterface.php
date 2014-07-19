<?php

namespace LMammino\EFoundation\Model;

/**
 * Interface IdentifiableInterface
 *
 * @package LMammino\EFoundation\Model
 */
interface IdentifiableInterface
{
    /**
     * Get the unique identifier associated to the resource
     *
     * @return string
     */
    public function getId();
} 