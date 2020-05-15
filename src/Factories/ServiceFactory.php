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
     * @param servicesFactory $services
     * @throws configurationException
     */
    public function __construct(servicesFactory $services) {
        $this->configData = new EncrypterConfigurations();

        parent::__construct($services);
    }

    /**
     * @param servicesFactory $services
     * @return Encrypter
     */
    public function create(servicesFactory $services) : Encrypter {
        return new Encrypter($this->configData, $services);
    }
}