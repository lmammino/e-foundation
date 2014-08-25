<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Attribute\Model\AttributeValueInterface as BaseAttributeValueInterface;

/**
 * Interface AttributeValueInterface
 *
 * @package LMammino\EFoundation\Product\Model
 */
interface AttributeValueInterface extends BaseAttributeValueInterface
{
    /**
     * Get the product
     *
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * Set the product
     *
     * @param ProductInterface $product
     *
     * @return $this
     */
    public function setProduct(ProductInterface $product = null);
}
