<?php

namespace Team1\ModuleMenu\Model\Catalog;

class CategoryPlugin
{
    /** @var \Mestrona\CategoryRedirect\Helper\Data */
    protected $_helper;

    /**
     * CategoryPlugin constructor.
     *
     * @param \Mestrona\CategoryRedirect\Helper\Data $_helper
     */
    public function __construct(\Team1\ModuleMenu\Helper\Data $_helper)
    {
        $this->_helper = $_helper;
    }

    /**
     * @param \Magento\Catalog\Model\Category $subject
     * @param callable $proceed
     *
     * @return string
     */
    public function aroundGetUrl(
        \Magento\Catalog\Model\Category $subject,
        callable $proceed
    ) {
        $redirectUrl = $subject->getRedirectUrl();
        if(!$redirectUrl) {
            return $proceed();
        }
        return $this->_helper->buildUrl($redirectUrl);
    }
}
