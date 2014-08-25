<?php

namespace LMammino\EFoundation\Tests\Dummy\Attribute\Model;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface;
use LMammino\EFoundation\Attribute\Model\AttributeSubjectTrait;

/**
 * Class DummyAttributeSubject
 *
 * @package LMammino\EFoundation\Tests\Dummy\Attribute\Model
 */
class DummyAttributeSubject implements AttributeSubjectInterface
{
    use AttributeSubjectTrait;
}
