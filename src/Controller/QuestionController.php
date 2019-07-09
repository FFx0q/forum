<?php
    namespace App\Controller;

    use App\Base\Http;
    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Base\Request;
    use App\Base\Session;
    use App\Models\Question;
    use App\Models\Post;
    
    
    class QuestionController extends Controller
    {
        public function index() {}
            
        public function show($id)
        {
            $question = new Question();
            $posts = $question->findQuestionById($id);

            return View::render('topic/post.twig',
            [
                'posts' => $posts
            ]);
        }

        public function create()
        {
            return View::render('topic/create.twig');
        }

        public function save()
        {
            $question = new Question();
            $post = new Post();
            $date = new \DateTime();

            if (!Http::isPost())
                return;
                
            $uid = (int)Session::get('user_id');
            $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : " ";
            $content = isset($_POST['post']) ? trim(htmlspecialchars($_POST['post'])) : " ";
            $qid = $question->save($uid, $title, $date->getTimestamp());
            $post->save($uid, $qid, $content, $date->getTimestamp());
            Router::redirect("/question/show/".$qid);
        }
    }