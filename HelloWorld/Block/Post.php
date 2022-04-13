<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml;

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'post';
        $this->_headerText = __('post');
        $this->_addButtonLabel = __('Add New Post');
        parent::_construct();
    }
}
