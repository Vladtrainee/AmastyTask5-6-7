<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace HelloWorld\HelloWorld\Controller;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    private $actionFactory;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {

        $this->actionFactory = $actionFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Validate and Match Cms Page and modify request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
        $configValue = $this->scopeConfig->getValue('test/general/set_url');

        if ($identifier != $configValue) {
            return null;
        }

        $request->setModuleName('helloworld')->setControllerName('index')->setActionName('index');

        return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
    }
}