<?php
    namespace Application\Controller;

use Application\Model\Category;
use Application\Model\Post;
use Application\Model\Thread;
use System\Http\Response;
use System\Controller\AbstractController;

class CategoryController extends AbstractController
    {
        public function handle(string $method, int $id = null)
        {
            switch($method) {
                case "GET": {
                    if ($id === null) {
                        $this->getAllCategories();
                        break;
                    }
                    $this->getCategory($id);
                    break;
                }
            }
        }
        public function getAllCategories()
        {
            $result = $this->buildResponse();


            $response = new Response(200, json_encode($result));
            $response->send();
        }

        public function getCategory(int $id = 1)
        {
            $result = $this->buildResponse($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }

        private function buildResponse(int $id = null)
        {
            $result = [];
            $model = new Category($this->getDatabase());
            if ($id === null) {
                $categories = $this->getAllCategories();
            } else {
                $categories = $this->getCategory($id);
            }

            foreach($categories as $category){
                $subcategories = $this->addSubCategory($category['id']);
                $temp = [];
                
                foreach ($subcategories as $subcategory) {
                    $threads = $this->addThreads($subcategory['id']);
                    $tempTh = [];

                    foreach ($threads as $thread) {
                        $posts = $this->addPosts($thread['id']);
                        $thread += ['posts' => $posts];
                        array_push($tempTh, $thread);
                    }
                    $subcategory += ['threads' => $tempTh];
                    array_push($temp, $subcategory);
       
                }
                $category += ['subcategories' => $temp];
                array_push($result, $category);
            }

            return $result;
        }
        
        private function addSubCategory(int $id)
        {
            $model = new Category($this->getDatabase());
            $subcategories = $model->getSubCategories($id);

            return $subcategories;
        }

        private function addThreads(int $id)
        {
            $model = new Thread($this->getDatabase());
            $threads = $model->getTheardsCategory($id);

            return $threads;
        }

        private function addPosts(int $id)
        {
            $model = new Post($this->getDatabase());
            $posts = $model->getThreadPost($id);

            return $posts;
        }
    }
