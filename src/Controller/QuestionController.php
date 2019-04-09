<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Base\Request;
    use App\Models\Question;
    use App\Models\Post;
    
    
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

        public function CreateAction()
        {
            return View::render('topic/create.twig');
        }

        public function create($uid, $title, $content, $date)
        {
            $qid = Question::createNewQuestion($uid, $title, $date);
            Post::createNewPost($uid, $qid, $content, $date);

            Router::redirect("/question/show/".$qid);
        }
    }