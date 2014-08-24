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
}
