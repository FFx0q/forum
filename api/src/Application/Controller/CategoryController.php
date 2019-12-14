<?php
    namespace Application\Controller;

use Application\Model\Category;
use System\Controller\AbstractController;
use System\Http\Response;

class CategoryController extends AbstractController
    {
        public function handle(string $method, int $id = null)
        {
            switch($method) {
                case "GET": {
                    if ($id === null) {
                        $this->getAllCategory();
                        break;
                    }
                    $this->getCategory($id);
                    break;
                }
            }
        }

        public function getAllCategory()
        {
            $model = new Category($this->getDatabase());
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            $response->prepare()->send();
        }

        public function getCategory(int $id = 1)
        {
            $model = new Category($this->getDatabase());
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            $response->prepare()->send();
        } 
    }
