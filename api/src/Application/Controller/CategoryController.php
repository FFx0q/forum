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
            $result = $model->findAll();

            if ($model->hasResult($result) === false) {
                return $this->notFound();
            }
                
            return new Response(200, json_encode($result));
        }

        public function getCategory(int $id = null)
        {
            $model = new Category();
            $result = $model->find($id);

            if ($model->hasResult($result) === false) {
               return $this->notFound();
            }
                
            return new Response(200, json_encode($result));
        }

        public function getSubCategories(int $id = null)
        {
            $model = new Category();
            $result = $model->getSubcategories($id);

            if ($model->hasResult($result) === false) {
                return $this->notFound();
            }

            return new Response(200, json_encode($result));
        }
    }
