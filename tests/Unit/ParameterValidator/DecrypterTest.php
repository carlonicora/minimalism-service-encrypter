<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Tests\Unit\ParameterValidator;

use CarloNicora\Minimalism\Services\Encrypter\Encrypter;
use CarloNicora\Minimalism\Services\Encrypter\Factories\ServiceFactory;
use CarloNicora\Minimalism\Services\Encrypter\ParameterValidator\Decrypter;
use CarloNicora\Minimalism\Services\Encrypter\Tests\Abstracts\AbstractTestCase;
use Exception;

class DecrypterTest extends AbstractTestCase
{
    /**
     * @return Decrypter
     * @throws Exception
     */
    public function testParameterDecryption() : Decrypter
    {
        if (false === getenv('MINIMALISM_SERVICE_ENCRYPTER_KEY')) {
            putenv("MINIMALISM_SERVICE_ENCRYPTER_KEY=81737a943b0c5d72");
        }
        if (!isset($_ENV['MINIMALISM_SERVICE_ENCRYPTER_KEY'])) {
            $_ENV['MINIMALISM_SERVICE_ENCRYPTER_KEY'] = '81737a943b0c5d72';
        }
        $this->services->loadService(ServiceFactory::class);

        /** @var Encrypter $encrypter */
        $encrypter = $this->services->service(Encrypter::class);

        $decrypter = new Decrypter($encrypter);

        $this->assertEquals($encrypter->decryptId('Carlo'),$decrypter->decryptParameter('Carlo'));

        return $decrypter;
    }

    /**
     * @param Decrypter $decrypter
     * @depends testParameterDecryption
     */
    public function testFailedParameterDecryption(Decrypter $decrypter) : void
    {
        $this->assertNotEquals(1,$decrypter->decryptParameter('Carlo'));
    }
}