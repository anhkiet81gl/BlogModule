<?php

namespace Mageplaza\HelloWorld\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{

    /** Url path */
    const URL_PATH_EDIT = 'mageplaza_helloworld/post/edit';
    const URL_PATH_DELETE = 'mageplaza_helloworld/post/delete';

    protected $actionUrlBuilder;
    protected $urlBuilder;

    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface       $urlBuilder,
        array              $components = [],
        array              $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['post_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_EDIT, [
                                'post_id' => $item['post_id']
                            ]
                        ),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_DELETE, [
                                'post_id' => $item['post_id']
                            ]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete'),
                            'message' => __('Are you sure you wan\'t to delete record?')
                        ]
                    ];
                    $item[$name]['preview'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_EDIT, [
                                'post_id' => $item['post_id']
                            ]
                        ),
                        'label' => __('View')
                    ];
                }
            }
        }

        return $dataSource;
    }

}
