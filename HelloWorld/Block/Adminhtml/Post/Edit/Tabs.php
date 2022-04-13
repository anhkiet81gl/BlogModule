<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml\Post\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('mageplaza_helloworld_post_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Info'));
    }

}
