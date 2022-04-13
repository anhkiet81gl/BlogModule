<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class Delete extends \Mageplaza\HelloWorld\Controller\Adminhtml\Post
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('post_id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('Mageplaza\HelloWorld\Model\Post');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the item.'));
                $this->_redirect('mageplaza_helloworld/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('mageplaza_helloworld/*/edit', ['id' => $this->getRequest()->getParam('post_id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        $this->_redirect('mageplaza_helloworld/*/');
    }
}
