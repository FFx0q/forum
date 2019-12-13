<?php
namespace Application\Controller;

use Application\Model\Category;
use System\Controller\AbstractController;
use System\Database\Database;
use System\Http\Response;

class IndexController extends AbstractController
{
    public function handle(string $method, int $param = null)
    {
        switch ($method) {
            case "GET": {
                if ($param === null) {
                    $this->getAllCategory();
                }
            break;
            }
            default: {
                $this->invalidMethod();
            }
        }
    }

    public function getAllCategory()
    {
        $categoryModel = new Category(Database::create()->getConnection());

        $category = $categoryModel->findAll();
        $json = json_encode($category);

        $response = new Response(200, $json);
        $response->prepare()->send();
    }
}
