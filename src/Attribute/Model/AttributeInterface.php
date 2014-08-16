<?php

namespace LMammino\EFoundation\Attribute\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface AttributeInterface
 *
 * @package LMammino\EFoundation\Attribute\Model
 */
interface AttributeInterface extends IdentifiableInterface
{
    /**
     * Get the name
     *
     * @return string
     */
    public function getName();

    /**
     * Set the name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * Get the presentation (how the attribute name is displayed to the user)
     *
     * @return string
     */
    public function getPresentation();

    /**
     * Set the presentation
     *
     * @param string $presentation
     *
     * @return $this
     */
    public function setPresentation($presentation);

    /**
     * Get the type
     *
     * @return string
     */
    public function getType();

    /**
     * Set the type
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type);

    /**
     * Get configuration
     *
     * @return array
     */
    public function getConfiguration();

    /**
     * Set configuration
     *
     * @param array $configuration
     *
     * @return $this
     */
    public function setConfiguration(array $configuration);
}
