<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

class Save extends \Mageplaza\HelloWorld\Controller\Adminhtml\Post
{
    public function execute()
    {
        if ($this->getRequest()->getPostValue()) {
            try {
                $model = $this->_objectManager->create('Mageplaza\HelloWorld\Model\Post');
                $data = $this->getRequest()->getPostValue();
                $inputFilter = new \Zend_Filter_Input(
                    [],
                    [],
                    $data
                );
                $data = $inputFilter->getUnescaped();
                $id = $this->getRequest()->getParam('post_id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong item is specified.'));
                    }
                }
                $model->setData($data);
                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();

                $this->messageManager->addSuccess(__('You saved the item.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('mageplaza_heloworld/*/edit', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('mageplaza_helloworld/post/index');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('post_it');
                if (!empty($id)) {
                    $this->_redirect('mageplaza_heloworld/*/edit', ['id' => $id]);
                } else {
                    $this->_redirect('mageplaza_heloworld/*/new');
                }
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('Something went wrong while saving the item data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('mageplaza_heloworld/*/edit', ['id' => $this->getRequest()->getParam('post_id')]);
                return;
            }
        }
        $this->_redirect('mageplaza_heloworld/*/');
    }
}
