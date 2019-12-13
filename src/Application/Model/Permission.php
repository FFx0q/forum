<?php
    namespace App\Models;

    use PDO;
    use App\Base\Model;
    use App\Base\Session;

    class Permission extends Model
    {
        public function hasPermission(string $permission)
        {
            $group_id = Session::get('user_group');
            $stmt = $this->getDb()
                ->prepare('
                    SELECT count(*) as c
                    FROM GroupPermission gp
                    JOIN Groups g ON gp.group_id = g.id
                    JOIN Permission p ON gp.permission_id = p.id
                    WHERE p.permission_name = :name
                    AND g.id = :id
                ');
            $stmt->bindParam(':name', $permission);
            $stmt->bindParam(':id', $group_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['c'];
        }
    }
