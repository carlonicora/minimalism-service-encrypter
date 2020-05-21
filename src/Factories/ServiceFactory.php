<?php
namespace CarloNicora\Minimalism\Services\Encrypter\Factories;

use CarloNicora\Minimalism\Core\Services\Exceptions\ConfigurationException;
use CarloNicora\Minimalism\Core\Services\Abstracts\AbstractServiceFactory;
use CarloNicora\Minimalism\Services\Encrypter\Configurations\EncrypterConfigurations;
use CarloNicora\Minimalism\Services\Encrypter\Encrypter;
use CarloNicora\Minimalism\Core\Services\Factories\ServicesFactory;

class ServiceFactory extends AbstractServiceFactory {
    /**
     * serviceFactory constructor.
     * @param ServicesFactory $services
     * @throws ConfigurationException
     */
    public function __construct(ServicesFactory $services) {
        $this->configData = new EncrypterConfigurations();

        parent::__construct($services);
    }

    /**
     * @param ServicesFactory $services
     * @return Encrypter
     */
    public function create(ServicesFactory $services) : Encrypter {
        return new Encrypter($this->configData, $services);
    }
}