<?php

namespace LMammino\EFoundation\Model\Variation;

/**
 * Interface OptionValueInterface
 *
 * @package LMammino\EFoundation\Model\Variation
 */
interface OptionValueInterface
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
     * @param OptionInterface $option
     *
     * @return $this
     */
    public function setOption(OptionInterface $option);

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
     * Get presentation
     *
     * @return string
     */
    public function getPresentation();

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return $this
     */
    public function setPresentation($presentation);
}
