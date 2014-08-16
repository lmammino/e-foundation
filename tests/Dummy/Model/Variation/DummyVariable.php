<?php

namespace LMammino\EFoundation\Tests\Dummy\Model\Variation;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;
use LMammino\EFoundation\Variation\Model\VariableInterface;
use LMammino\EFoundation\Variation\Model\VariableTrait;

/**
 * Class DummyVariable
 *
 * @package LMammino\EFoundation\Tests\Dummy\Model\Variation
 */
class DummyVariable implements VariableInterface
{
    use IdentifiableTrait;
    use VariableTrait {
        VariableTrait::__construct as private __variableConstruct;
    }
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__variableConstruct();
        $this->__timestampableConstruct();
    }
}
