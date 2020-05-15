<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Tests\Abstracts;

use CarloNicora\Minimalism\Core\Services\Factories\ServicesFactory;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /** @var ServicesFactory|null  */
    protected ?ServicesFactory $services = null;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->services = new ServicesFactory();
    }
}