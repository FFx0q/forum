<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Base\Request;
    use App\Base\Session;
    use App\Base\Acl;
    use App\Models\Question;
    use App\Models\Post;
    
    
    class QuestionController extends Controller
    {
        public function ShowAction()
        {
            $question = new Question();
            $acl = new Acl();

            $posts = $question->findQuestionById($this->getRouter()->getParam());
            $permission = [
                'show' => $acl->check('show'),
                'create' => $acl->check('create')
            ];
            return View::render('topic/post.twig',
            [
                'posts' => $posts,
                'permission' => $permission
            ]);
        }

        public function CreateAction()
        {
            $acl = new Acl();
            $permission = $acl->check('create', Session::get('user_group'));

            return View::render('topic/create.twig', [
                'permission' => $permission
            ]);
        }

        public function SaveAction()
        {
            $question = new Question();
            $post = new Post();
            $date = new \DateTime();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $uid = (int)Session::get('user_id');
                $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : " ";
                $content = isset($_POST['post']) ? trim(htmlspecialchars($_POST['post'])) : " ";
                $qid = $question->save($uid, $title, $date->getTimestamp());
                $post->save($uid, $qid, $content, $date->getTimestamp());

                Router::redirect("/question/show/".$qid);
            }
        }
    }