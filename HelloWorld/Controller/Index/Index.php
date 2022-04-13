<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $postCollection;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection $postCollection
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postCollection = $postCollection;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $data = [
//            'name' => "How to Create SQL Setup Script in Magento 3",
//            'post_content' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
//            'url_key' => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
//            'tags' => 'magento 2,mageplaza helloworld',
//            'status' => 1
//        ];
//        $post = $this->_postFactory->create();


        $collection = $this->postCollection->getItems();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
//        return $this->_pageFactory->create();
    }
}
