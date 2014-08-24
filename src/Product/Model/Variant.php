<?php

namespace LMammino\EFoundation\Product\Model;

use LMammino\EFoundation\Variation\Model\VariableInterface;
use LMammino\EFoundation\Variation\Model\Variant as BaseVariant;

/**
 * Class Variant
 *
 * @package LMammino\EFoundation\Product\Model
 */
class Variant extends BaseVariant implements VariantInterface
{
    /**
     * @var ProductInterface $product
     */
    protected $product;

    /**
     * {@inheritDoc}
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * {@inheritDoc}
     */
    public function setProduct(ProductInterface $product = null)
    {
        return $this->setObject($product);
    }

    /**
     * {@inheritDoc}
     */
    public function setObject(VariableInterface $object = null)
    {
        $this->object = $this->product = $object;

        return $this;
    }
}
