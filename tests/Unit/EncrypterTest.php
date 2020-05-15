<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Tests\Unit;

use CarloNicora\Minimalism\Core\Services\Exceptions\ConfigurationException;
use CarloNicora\Minimalism\Services\Encrypter\Encrypter;
use CarloNicora\Minimalism\Services\Encrypter\Factories\ServiceFactory;
use CarloNicora\Minimalism\Services\Encrypter\Tests\Abstracts\AbstractTestCase;

class EncrypterTest extends AbstractTestCase
{
    public function testFailEncrypterInitialisationWithoutConfigurations() : void
    {
        unset($_ENV['MINIMALISM_SERVICE_ENCRYPTER_KEY']);

        $this->expectExceptionCode(ConfigurationException::MISSING_REQUIRED_CONFIGURATION);

        $this->services->loadService(ServiceFactory::class);
    }

    public function testEncrypterInitialisation() : Encrypter
    {
        if (false === getenv('MINIMALISM_SERVICE_ENCRYPTER_KEY')) {
            putenv("MINIMALISM_SERVICE_ENCRYPTER_KEY=81737a943b0c5d72");
        }
        if (!isset($_ENV['MINIMALISM_SERVICE_ENCRYPTER_KEY'])) {
            $_ENV['MINIMALISM_SERVICE_ENCRYPTER_KEY'] = '81737a943b0c5d72';
        }
        $this->services->loadService(ServiceFactory::class);

        $response = $this->services->service(Encrypter::class);

        $this->assertEquals(1,1);

        return $response;
    }

    /**
     * @depends testEncrypterInitialisation
     * @param Encrypter $encrypter
     */
    public function testEncryptionDecryption(Encrypter $encrypter) : void
    {
        $key = 123;

        $encryptedKey = $encrypter->encryptId($key);
        $this->assertNotEquals($key, $encryptedKey);
        $this->assertEquals($key, $encrypter->decryptId($encryptedKey));
    }

    /**
     * @depends testEncrypterInitialisation
     * @param Encrypter $encrypter
     */
    public function testEncryptionDecryptionByKey(Encrypter $encrypter) : void
    {
        $key = 123;

        $encryptedKey = $encrypter->encryptByKey($key, '27363', 5);
        $this->assertNotEquals($key, $encryptedKey);
        $this->assertEquals($key, $encrypter->decryptByKey($encryptedKey,'27363', 5));
    }
}