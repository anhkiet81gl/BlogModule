<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class NewAction extends \Mageplaza\HelloWorld\Controller\Adminhtml\Post
{
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_HelloWorld::post')
            ->addBreadcrumb(__('Info'), __('Info'))
            ->addBreadcrumb(__('Manage Info'), __('Manage Info'));
        return $resultPage;
    }

    public function execute()
    {
        $this->_forward('edit');
    }
}
