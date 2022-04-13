<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class Index extends \Mageplaza\HelloWorld\Controller\Adminhtml\Post
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_HelloWorld::post');
        $resultPage->getConfig()->getTitle()->prepend(__('Post Management'));
        $resultPage->addBreadcrumb(__('Post'), __('Post'));
        return $resultPage;
    }
}
