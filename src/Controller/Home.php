<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\Question;

    class Home extends Controller
    {
        public function IndexAction() 
        {
            $data = Question::getAllQuestion();
            
            return View::render('home/home.twig',
                [
                    'questions' => $data
                ]
            );
        }
    }
