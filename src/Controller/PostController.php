<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\Session;
    use App\Models\Post;

    class PostController extends Controller 
    {
        public function CreateAction()
        {
            $post = new Post();

            $uid = (int)Session::get('user_id');
            $qid = (int)$this->getRouter()->getParam();
            $content = isset($_POST['post']) ? $this->validate($_POST['post']) : " ";
            $date = new \DateTime();

            $post->save($uid, $qid, $content, $date->getTimestamp(), 0);
            Router::redirect('/question/show/'.$qid);
        }
    }