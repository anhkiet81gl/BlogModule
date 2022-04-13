<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml\Post\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Store\Model\ScopeInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
    protected $scopeConfig;
    protected $client;
    protected $serializer;

    public function __construct(
        \Magento\Framework\Serialize\SerializerInterface   $serializer,
        \Magento\Framework\HTTP\ClientInterface            $client,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Backend\Block\Template\Context            $context,
        \Magento\Framework\Registry                        $registry,
        \Magento\Framework\Data\FormFactory                $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config                  $wysiwygConfig,
        array                                              $data = []
    )
    {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->scopeConfig = $scopeConfig;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Info Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Info Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_mageplaza_helloworld');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('post_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Info Information')]);
        if ($model->getId()) {
            $fieldset->addField('post_id', 'hidden', ['name' => 'post_id']);
        }
        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Name'), 'title' => __('Name'), 'required' => false]
        );

        $fieldset->addField(
            'url_key',
            'text',
            ['name' => 'url_key', 'label' => __('Url Key'), 'title' => __('Url Key'), 'required' => false]
        );

        $fieldset->addField(
            'post_content',
            'textarea',
            ['name' => 'post_content', 'label' => __('Content'), 'title' => __('Content'), 'required' => false]
        );

        $fieldset->addField(
            'tags',
            'text',
            ['name' => 'tags', 'label' => __('Tags'), 'title' => __('Tags'), 'required' => false]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'title' => __('Status'),
                'options' => [
                    'enable' => 'Enable',
                    'disable' => 'Disable',
                ],
                'required' => false]
        );

        $fieldset->addField(
            'featured_image',
            'text',
            [
                'name' => 'featured_image',
                'label' => __('Featured Image'),
                'title' => __('Featured Image'),
                'required' => false
            ]
        );

        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
