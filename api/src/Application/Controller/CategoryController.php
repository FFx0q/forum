<?php
    namespace Application\Controller;

    use Application\Model\Category;

    use System\Http\Response;
    use System\Controller\AbstractController;

    class CategoryController extends AbstractController
    {
        public function getCategories()
        {
            $model = new Category();
            $result = $model->getAllCategories();
                
            return new Response(200, json_encode($result));
        }

        public function getCategory(int $id = null)
        {
            $model = new Category();
            $result = $model->getCategory($id);

            if ($result === false) {
                $this->notFound();
                return;
            }
                
            return new Response(200, json_encode($result));
        }

        public function getSubCategories(int $id = null)
        {
            $model = new Category();
            $result = $model->getSubCategories($id);

            return new Response(200, json_encode($result));
        }
    }
