<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Session;
    use App\Base\Acl;
    use App\Models\Question;

    class HomeController extends Controller
    {
        public function IndexAction() 
        {
            $question = new Question();
            $acl = new Acl();
            $permission = $acl->check('show');

            $data = $question->getAllQuestion();

            return View::render('home/index.twig',
                [
                    'questions' => $data,
                    'permission' => $permission
                ]
            );
        }
    }
