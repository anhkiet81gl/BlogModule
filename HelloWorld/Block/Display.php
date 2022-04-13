<?php

namespace Mageplaza\HelloWorld\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    protected $postCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context          $context,
        \Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection $postCollection
    )
    {
        $this->postCollection = $postCollection;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection()
    {
        return $this->postCollection->getItems();
    }
}
