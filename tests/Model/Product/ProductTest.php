<?php

namespace LMammino\EFoundation\Tests\Model\Product;

use LMammino\EFoundation\Model\Product\Product;

/**
 * Class ProductTest
 *
 * @package LMammino\EFoundation\Tests\Model\Product
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Product $product
     */
    private $product;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->product = new Product();
    }

    /**
     * @test
     */
    public function it_should_implements_product_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Product\ProductInterface', $this->product);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'New Shoes';
        $this->product->setName($name);
        $this->assertEquals($name, $this->product->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_slug()
    {
        $slug = 'new-shoes';
        $this->product->setSlug($slug);
        $this->assertEquals($slug, $this->product->getSlug());
    }

    /**
     * @test
     */
    public function it_should_handle_a_description()
    {
        $description = 'I said, hey, I put some new shoes on and everybody\'s smiling';
        $this->product->setDescription($description);
        $this->assertEquals($description, $this->product->getDescription());
    }

    /**
     * @test
     */
    public function it_should_handle_an_available_on_date()
    {
        $availableOn = $this->getMock('\DateTime');
        $this->product->setAvailableOn($availableOn);
        $this->assertSame($availableOn, $this->product->getAvailableOn());
    }

    /**
     * @test
     */
    public function it_should_check_if_available()
    {
        $availableInThePast = new \DateTime('-2 months');
        $this->product->setAvailableOn($availableInThePast);
        $this->assertTrue($this->product->isAvailable());

        $availableInTheFuture = new \DateTime('+2 months');
        $this->product->setAvailableOn($availableInTheFuture);
        $this->assertFalse($this->product->isAvailable());
    }

    /**
     * @test
     */
    public function it_should_be_available_by_default()
    {
        $this->assertTrue($this->product->isAvailable());
    }

    /**
     * @test
     */
    public function it_should_handle_meta_keywords()
    {
        $keywords = 'black shoes converse';
        $this->product->setMetaKeywords($keywords);
        $this->assertEquals($keywords, $this->product->getMetaKeywords());
    }

    /**
     * @test
     */
    public function it_should_handle_meta_description()
    {
        $description = 'black shoes from converse are the best in town';
        $this->product->setMetaDescription($description);
        $this->assertEquals($description, $this->product->getMetaDescription());
    }
}
