<?php
    namespace App\Models;

    use App\Base\Model;
    use App\Base\Database;
    use PDO;

    class Question extends Model
    {
        public function getAllQuestion()
        {
            $stmt = $this->getDb()->query('SELECT q.id as qid, title, topic_date, 
                                count(p.id) as answers ,p.votes as vote, u.name, u.reputation
                                FROM Question q
                                JOIN Post p 
                                JOIN User u
                                ON p.question_id = q.id and q.author_id = u.id
                                GROUP BY q.id');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        /*
         * Return all posts for question
         */
        public function findQuestionById($id)
        {
            $stmt = $this->getDb()
                ->prepare('SELECT * 
                    FROM Post p
                    JOIN User u
                    JOIN Question q
                    ON p.question_id = q.id AND u.id = p.author_id
                    WHERE q.id = :id
                ');

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function save($uid, $title, $date)
        {
            $sql = "INSERT INTO Question (author_id, title, topic_date) VALUES(?, ?, ?)";
            $this->getDb()->prepare($sql)->execute([$uid, $title, $date]);
            return $this->getDb()->lastInsertId();
        }
    }
