<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class Edit extends \Mageplaza\HelloWorld\Controller\Adminhtml\Post
{
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_HelloWorld::helloworld')
            ->addBreadcrumb(__('Info'), __('Info'))
            ->addBreadcrumb(__('Manage Post'), __('Manage Post'));
        return $resultPage;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('post_id');

        $model = $this->_objectManager->create('Mageplaza\HelloWorld\Model\Post');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('mageplaza_helloworld/*');
                return;
            }
        }

        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('current_mageplaza_helloworld', $model);

        $this->_initAction();

        $this->_view->getLayout()->getBlock('mageplaza_helloworld_post_edit');
        $this->_view->renderLayout();
    }
}
