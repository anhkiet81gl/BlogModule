<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $postFactory;
    protected $postResource;

    public function __construct(
        \Magento\Framework\App\Action\Context          $context,
        \Magento\Framework\View\Result\PageFactory     $pageFactory,
        \Mageplaza\HelloWorld\Model\PostFactory        $postFactory,
        \Mageplaza\HelloWorld\Model\ResourceModel\Post $postResource
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = [
            'name' => "kiet asdasdasdasjhdjhasgdjahsgdjhasgdhjasgdhjasgd",
            'post_content' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
            'url_key' => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
            'tags' => 'magento 2,mageplaza helloworld',
            'status' => 1
        ];
        $post = $this->postFactory->create()->load(17);
//        $post->setName('kiet lac');
//        $post->setData($data);
        $this->postResource->delete($post);

        echo "Hello";
        exit;
    }
}
