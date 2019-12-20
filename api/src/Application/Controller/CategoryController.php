<?php
    namespace Application\Controller;

use Application\Model\Category;
use Application\Model\Post;
use Application\Model\Thread;
use System\Http\Response;
use System\Controller\AbstractController;

class CategoryController extends AbstractController
    {
        public function getCategories()
        {
            $model = new Category($this->getDatabase());
            $result = $model->getAllCategories();
            
            $response = new Response(200, json_encode($result));
            $response->send();
        }

        public function getCategory(int $id = null)
        {
            $model = new Category($this->getDatabase());
            $result = $model->getCategory($id);

            if ($result === false) {
                $this->notFound();
                return;
            }
            
            $response = new Response(200, json_encode($result));
            $response->send();
        }

        public function getSubCategories(int $id = null)
        {
            $model = new Category($this->getDatabase());
            $result = $model->getSubCategories($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }
    }
