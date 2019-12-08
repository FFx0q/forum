<?php
    namespace App\Controller;

    use App\Base\Controller;

    use App\Base\Session;
    use App\Models\Question;

    class HomeController extends Controller
    {
        public function index() 
        {
            $question = new Question($this->db);
            $permission = $this->acl->check('show');

            $data = $question->getAllQuestion();

            return $this->render('home/index.twig', [
                'questions' => $data,
                'permission' => $permission
            ]);
        }
    }
