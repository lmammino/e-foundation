<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Variation\Model\VariantInterface as BaseVariantInterface;

/**
 * Interface VariantInterface
 *
 * @package LMammino\EFoundation\Product\Model
 */
interface VariantInterface extends BaseVariantInterface
{
    /**
     * Get product
     *
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * Set product
     *
     * @param ProductInterface $product
     * @return $this
     */
    public function setProduct(ProductInterface $product = null);

    /**
     * Get available on
     *
     * @return \DateTime
     */
    public function getAvailableOn();

    /**
     * Set available on
     *
     * @param \DateTime $availableOn
     * @return $this
     */
    public function setAvailableOn(\DateTime $availableOn = null);
}
