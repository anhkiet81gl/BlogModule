<?php

namespace Mageplaza\HelloWorld\Api;


use Magento\Framework\Exception\NoSuchEntityException;

interface PostManagementInterface
{

    /**
     * GET for Post api
     * @param integer $id
     * @return string
     * @throws NoSuchEntityException
     */

    public function getPost($id);

    /**
     * @return string
     */
    public function getData();

    /**
     * @param int $id
     * @return bool true on success
     */
    public function getDelete($id);

    /**
     * GET for Post api
     * @param string $title
     * @return string
     */
    public function getEdit($title);

    /**
     * GET for Post api
     * @param string $title
     * @return string
     */
    public function getCreate($title);

}
