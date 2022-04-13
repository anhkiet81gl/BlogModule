<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml;

abstract class Post extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $fileFactory;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\Filter\Date
     */
    protected $dateFilter;

    /**
     * @var \Canawan\ProductCollection\Model\CampaignFactory
     */
    protected $ruleFactory;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;


    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     * @param \Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->fileFactory = $fileFactory;
        $this->dateFilter = $dateFilter;
        $this->logger = $logger;
        $this->resultPageFactory = $resultPageFactory;
    }

//    /**
//     * Initiate rule
//     *
//     * @return void
//     */
//    protected function _initRule()
//    {
//        $rule = $this->ruleFactory->create();
//        $this->_coreRegistry->register(
//            'current_canawan_productcollection_campaigns',
//            $rule
//        );
//        $id = (int)$this->getRequest()->getParam('id');
//
//        if (!$id && $this->getRequest()->getParam('campaign_id')) {
//            $id = (int)$this->getRequest()->getParam('campaign_id');
//        }
//
//        if ($id) {
//            $this->_coreRegistry->registry('current_canawan_productcollection_campaigns')->load($id);
//        }
//    }
    /**
     * Initiate action
     *
     * @return Rule
     */
//    protected function _initAction()
//    {
//        $this->_view->loadLayout();
//        $this->_setActiveMenu('Canawan_ProductCollection::productcollection')
//            ->_addBreadcrumb(__('Product Collection'), __('Product Collection'));
//        return $this;
//    }

}
