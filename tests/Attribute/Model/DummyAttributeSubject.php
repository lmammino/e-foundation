<?php

namespace LMammino\EFoundation\Tests\Attribute\Model;

use LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface;
use LMammino\EFoundation\Attribute\Model\AttributeSubjectTrait;

/**
 * Class DummyAttributeSubject
 *
 * @package LMammino\EFoundation\Tests\Attribute\Model
 */
class DummyAttributeSubject implements AttributeSubjectInterface
{
    use AttributeSubjectTrait;
}
