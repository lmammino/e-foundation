<?php

namespace LMammino\EFoundation\Tests\Dummy\Model\Attribute;

use LMammino\EFoundation\Model\Attribute\AttributeSubjectInterface;
use LMammino\EFoundation\Model\Attribute\AttributeSubjectTrait;

/**
 * Class DummyAttributeSubject
 *
 * @package LMammino\EFoundation\Tests\Dummy\Model\Attribute
 */
class DummyAttributeSubject implements AttributeSubjectInterface
{
    use AttributeSubjectTrait;
}
