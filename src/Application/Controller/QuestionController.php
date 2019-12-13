<?php
    namespace App\Controller;

    use App\Base\Http;
    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\Request;
    use App\Base\Session;
    use App\Base\Acl;
    use App\Models\Question;
    use App\Models\Post;

    class QuestionController extends Controller
    {
        public function index()
        {
        }
            
        public function show($id)
        {
            $question = new Question($this->db);
            $posts = $question->findQuestionById($id);
          
            $permission = [
                'show' => $this->acl->check('show'),
                'create' => $this->acl->check('create')
            ];

            return $this->render('topic/post.twig', [
                'posts' => $posts,
                'permission' => $permission
            ]);
        }

        public function create()
        {
            $permission = $this->acl->check('create');

            return $this->render('topic/create.twig', [
                'permission' => $permission
            ]);
        }

        public function save()
        {
            $question = new Question($this->db);
            $post = new Post($this->db);
            $date = new \DateTime();

            if (!Http::isPost()) {
                return;
            }
                
            $uid = (int)Session::get('user_id');
            $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : " ";
            $content = isset($_POST['post']) ? trim(htmlspecialchars($_POST['post'])) : " ";
            $qid = (int)$question->save($uid, $title, $date->getTimestamp());
            $post->save($uid, $qid, $content, $date->getTimestamp());
            Router::redirect("/question/show/".$qid);
        }
    }
