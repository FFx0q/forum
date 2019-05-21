<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\Question;

    class HomeController extends Controller
    {
        public function IndexAction() 
        {
            $model = new Question();

            $data = $model->getAllQuestion();
            return View::render('home/index.twig',
                [
                    'questions' => $data
                ]
            );
        }
    }
