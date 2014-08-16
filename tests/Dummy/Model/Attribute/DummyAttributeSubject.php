<?php

namespace LMammino\EFoundation\Tests\Dummy\Model\Attribute;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface;
use LMammino\EFoundation\Attribute\Model\AttributeSubjectTrait;

/**
 * Class DummyAttributeSubject
 *
 * @package LMammino\EFoundation\Tests\Dummy\Model\Attribute
 */
class DummyAttributeSubject implements AttributeSubjectInterface
{
    use AttributeSubjectTrait;
}
