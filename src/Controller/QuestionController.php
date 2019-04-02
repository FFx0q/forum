<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Base\Request;
    use App\Models\Question;
    
    
    class QuestionController extends Controller
    {
        public function ShowAction()
        {
            $posts = Question::getQuestionById($this->getRouter()->getParam());

            return View::render('topic/post.twig',
            [
                'posts' => $posts
            ]);
        }
    }