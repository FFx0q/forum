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
    }