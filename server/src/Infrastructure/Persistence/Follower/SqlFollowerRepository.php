<?php
    namespace Society\Infrastructure\Persistence\Follower;

    use PDO;
    use Society\Domain\User\UserId;
    use Society\Domain\Follower\Follower;
    use Society\Domain\Follower\FollowerRepository;

    class SqlFollowerRepository implements FollowerRepository
    {
        private PDO $pdo;
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function getFollowers(UserId $id): array
        {
            $stmt = $this->execute('SELECT uid, fid FROM Followers WHERE fid=?', [
                $id->id()
            ]);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll());
        }

        public function getFollows(UserID $id): array
        {
            $stmt = $this->execute('SELECT uid, fid FROM Followers WHERE uid=?', [
                $id->id()
            ]);
            
            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll());
        }

        public function remove(Follower $follower)
        {
            return $this->execute('DELETE FROM Followers WHERE uid=:uid AND fid=:fid', [
               'uid' => $follower->uid->id(),
               'fid' => $follower->fid->id(),
            ]);
        }

        public function save(Follower $follower)
        {
            return $this->execute('INSERT INTO Followers VALUES(:uid, :fid)', [
                'uid' => $follower->uid->id(),
                'fid' => $follower->fid->id()
            ]);
        }

        private function build($row): Follower
        {
            return new Follower(
                new UserId($row['uid']),
                new UserId($row['fid'])
            );
        }

        private function execute(string $sql, array $params): \PDOStatement
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;
        }
    }
