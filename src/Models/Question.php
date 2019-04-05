<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class Question extends Model
    {
        public static function getAllQuestion()
        {
            $db = static::getInstance();
            $stmt = $db->query('SELECT q.id as qid, title, topic_date, 
                                count(p.id) as answers ,p.votes as vote, u.name, u.reputation
                                FROM Question q
                                JOIN Post p 
                                JOIN User u
                                ON p.question_id = q.id and q.author_id = u.id
                                GROUP BY q.id');

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getQuestionById($id)
        {
            $db = static::getInstance();

            $stmt = $db
                ->prepare('SELECT p.post, p.post_date, p.question_id qid, q.title, u.name
                         FROM Post p
                         JOIN Question q
                         JOIN User u
                         ON p.question_id = q.id
                         WHERE q.id = :id
                ');

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
    }