<?php

namespace LMammino\EFoundation\Common\Model;

/**
 * Interface IdentifiableInterface
 *
 * @package LMammino\EFoundation\Common\Model
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
