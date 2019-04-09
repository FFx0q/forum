<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Router;
    use App\Models\Post;

    class PostController extends Controller 
    {
        public function create($uid, $qid, $content, $date, $votes = 0)
        {
            Post::createNewPost($uid, $qid, $content, $date, $votes);
            Router::redirect('/question/show/'.$qid);
        }
    }