<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\User;
    use App\Models\Post;
    use App\Models\Question;


    class AdminController extends Controller
    {
        public function IndexAction()
        {
            $data = [
                "users" => count(User::getAllUsers()),
                "posts" => count(Post::getAllPosts()),
                "questions" => count(Question::getAllQuestion())
            ];
            View::render('admin/index.twig', [
                'data' => $data
            ]);
        }
    }