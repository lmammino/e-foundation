<?php

namespace LMammino\EFoundation\Variation\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface OptionValueInterface
 *
 * @package LMammino\EFoundation\Variation\Model
 */
interface OptionValueInterface extends IdentifiableInterface
{
    /**
     * Get the related option
     *
     * @return OptionInterface
     */
    public function getOption();

    /**
     * Set the related option
     *
     * @param OptionInterface|null $option
     *
     * @return $this
     */
    public function setOption(OptionInterface $option = null);

    /**
     * Get the value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value);

    /**
     * Get the name
     *
     * @return string
     */
    public function getOptionName();

    /**
     * Proxy method to get presentation name of the related option
     *
     * @return string
     */
    public function getOptionPresentation();
}
