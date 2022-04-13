<?php

namespace Mageplaza\HelloWorld\Model;


class PostManagement
{

    protected $dir;
    protected $resource;
    protected $connection;
    protected $postFactory;
    protected $postCollection;

    public function __construct(
        \Magento\Framework\App\ResourceConnection                 $resource,
        \Magento\Framework\Filesystem\DirectoryList               $dir,
        \Mageplaza\HelloWorld\Model\PostFactory                   $postFactory,
        \Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection $postCollection

    )
    {
        $this->resource = $resource;
        $this->connection = $resource->getConnection();
        $this->dir = $dir;
        $this->postFactory = $postFactory;
        $this->postCollection = $postCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function getPost($id)
    {
        try {
            if ($id) {
                $data = $this->postFactory->create()->load($id)->getData();
                return ['success' => true, 'message' => json_encode($data)];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** * @return array */
    public function getData(): array
    {
        try {
            return $this->postFactory->create()->getCollection()->getData();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** * @param int $id * @return bool true on success */
    public function getDelete($id): string
    {
        try {
            if ($id) {
                $data = $this->postFactory->create()->load($id);
                $data->delete();
                return "success";
            }
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return "false";
    }

    /** * GET for Post api * @param string $title * @return string */
    public function getEdit($title)
    {
        $edit = file_get_contents("php://input");
        $data = json_decode($edit, true);
        $insertData = $this->postFactory->create();
        $id = $data['id'];
        if ($id) {
            try {
                $insertData->load($id);
                $insertData->setName($data['name'])->save();
                $insertData->setUrlKey($data['url_key'])->save();
                $insertData->setPostContent($data['post_content'])->save();
                $insertData->setTags($data['tags'])->save();
                $insertData->setStatus($data['status'])->save();
                $insertData->setFeaturedImage($data['featured_image'])->save();
                $response = ['success' => true, 'message' => $data];
            } catch (\Exception $e) {
                $response = ['success' => false, 'message' => $e->getMessage()];
            }
        }
        return $response;
    }

    /** * GET for Post api * @param string $title * @return string */
    public function getCreate($title)
    {
        $edit = file_get_contents("php://input");
        $data = json_decode($edit, true);

        $insertData = $this->postFactory->create();
        try {
            $insertData->addData($data)->save();
            $response = ['success' => true, 'message' => $data];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }

}
