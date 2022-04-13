<?php

namespace Mageplaza\HelloWorld\Model\Config;

use Mageplaza\HelloWorld\Model\ResourceModel\Post;
use Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $postCollection,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $postCollection;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
        }
        return $this->_loadedData;
    }
}
