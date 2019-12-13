<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\Session;
    use App\Models\Post;

    class PostController extends Controller
    {
        public function index()
        {
        }
            
        public function create($id)
        {
            $post = new Post($this->db);

            $uid = (int)Session::get('user_id');
            $content = isset($_POST['post']) ? $this->validate($_POST['post']) : " ";
            $date = new \DateTime();

            $post->save($uid, $id, $content, $date->getTimestamp(), 0);
            Router::redirect('/question/show/'.$id);
        }
    }
