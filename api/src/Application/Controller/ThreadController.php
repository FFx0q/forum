<?php

    namespace Application\Controller;

    use Application\Model\Thread;
    use System\Controller\AbstractController;
    use System\Http\Response;

    class ThreadController extends AbstractController
    {
        public function handle(string $method, int $id = null)
        {
            switch ($method) {
                case "GET": {
                    if ($id === null) {
                        $this->getAllTheards();
                        break;
                    }
                    $this->getTheard($id);
                    break;
                }
            }
        }

        public function getAllTheards()
        {
            $model = new Thread($this->getDatabase());
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            $response->send();

        }

        public function getTheard(int $id)
        {
            $model = new Thread($this->getDatabase());
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }
    }
