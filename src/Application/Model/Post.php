<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class Post extends Model
    {
        public function getAllPosts($id)
        {
            $stmt = $this->getDb()->prepare('
                SELECT *
                FROM Post p
                JOIN Question q
                JOIN User u
                ON q.id = p.question_id and u.id = p.author_id
                WHERE p.question_id = :id
            ');
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function save($uid, $qid, $content, $date)
        {
            $sql = "INSERT INTO Post(author_id, question_id, post, post_date, votes) VALUES(?, ?, ?, ?, ?)";
            
            return $this->getDb()->prepare($sql)->execute([$uid, $qid, $content, $date, 0]);
        }
    }
