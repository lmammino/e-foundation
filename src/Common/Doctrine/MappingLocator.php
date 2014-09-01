<?php

namespace LMammino\EFoundation\Common\Doctrine;

/**
 * Class MappingLocator
 *
 * @package LMammino\EFoundation\Common\Doctrine
 */
class MappingLocator
{
    /**
     * Get the mapping
     *
     * @return array
     */
    public static function getMappings()
    {
        $basePath = self::getBasePath();

        return array(
            realpath($basePath.'Address/Resources/config/doctrine/model') => 'LMammino\EFoundation\Address\Model',
            realpath($basePath.'Attribute/Resources/config/doctrine/model') =>
                'LMammino\EFoundation\Attribute\Model',
            realpath($basePath.'Cart/Resources/config/doctrine/model') => 'LMammino\EFoundation\Cart\Model',
            realpath($basePath.'Order/Resources/config/doctrine/model') => 'LMammino\EFoundation\Order\Model',
            realpath($basePath.'Price/Resources/config/doctrine/model') => 'LMammino\EFoundation\Price\Model',
            realpath($basePath.'Product/Resources/config/doctrine/model') => 'LMammino\EFoundation\Product\Model',
            realpath($basePath.'Variation/Resources/config/doctrine/model') =>
                'LMammino\EFoundation\Variation\Model',
        );
    }

    /**
     * Get the default resolves association map
     *
     * @return array
     */
    public static function getDefaultResolves()
    {
        $defaultResolves = require(self::getBasePath().'Common/Resources/config/doctrine/optimized_resolve.php');

        return $defaultResolves;
    }

    /**
     * Get base path
     *
     * @return string
     */
    private static function getBasePath()
    {
        return __DIR__.'/../../';
    }
}
