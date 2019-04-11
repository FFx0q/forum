<?php 
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class Post extends Model
    {
        public function getAllPosts()
        {
            $db = static::getInstance();

            $stmt = $db->prepare('
                SELECT *
                FROM Post
            ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function createNewPost($uid, $qid, $content, $date, $votes = 0)
        {
            $db = static::getInstance();
            $sql = "INSERT INTO Post(author_id, question_id, post, post_date, votes) VALUES(?, ?, ?, ?, ?)";
            
            return $db->prepare($sql)->execute([$uid, $qid, $content, $date, $votes]);
        }
    }