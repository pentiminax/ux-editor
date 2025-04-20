<?php

namespace Pentiminax\UX\Editor\Tests\Model\BlockData;

use Pentiminax\UX\Editor\Enum\ListCounterType;
use Pentiminax\UX\Editor\Model\BlockData\ListMeta;
use PHPUnit\Framework\TestCase;

class ListMetaTest extends TestCase
{
    public function testListMeta(): void
    {
        $listMeta = new ListMeta(
            counterType: ListCounterType::NUMERIC
        );

        $this->assertSame(ListCounterType::NUMERIC->value, $listMeta->jsonSerialize()['counterType']);
    }
}