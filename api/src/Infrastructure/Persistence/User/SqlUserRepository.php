<?php
    namespace Society\Infrastructure\Persistence\User;

    use DateTime;
    use PDO;
    use Society\Application\Core\Database;
    use Society\Domain\User\User;
    use Society\Domain\User\UserId;
    use Society\Domain\User\UserRepository;

    class SqlUserRepository implements UserRepository
    {
        private PDO $pdo;

        public function __construct()
        {
            $this->pdo = Database::getFactory()->getConnection();
        }

        public function all(): array
        {
            $stmt = $this->execute('SELECT * FROM User', []);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll(PDO::FETCH_ASSOC));
        }

        public function ofUsername(string $username)
        {
            $stmt = $this->execute('SELECT * FROM User WHERE username = :username', [
                'username' => $username
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row === false) {
                return;
            }

            return $this->build($row);
        }

        public function ofId(UserId $id): User
        {
            $stmt = $this->execute('SELECT * FROM User WHERE id = :id',[
                'id' => $id->id()
            ]);

            return $this->build($stmt->fetch(PDO::FETCH_ASSOC));
        }

        public function remove(User $u)
        {
            return $this->execute('DROP User WHERE id=:id', [
                'id' => $u->id->id()
            ]);
        }

        public function save(User $u)
        {
            $sql = 'INSERT INTO User VALUES  (?,?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([$u->id, $u->username, $u->password, $u->email, $u->createdAt]);
        }

        public function update(User $u)
        {
            $sql = 'UPDATE User SET username=?, password=?, email=?, createdAt=? WHERE  id=?';
            $this->execute($sql, [
                $u->username, $u->password, $u->email, $u->createdAt, $u->id->id()
            ]);
        }

        private function build($row)
        {
            return new User(
                new UserId($row['id']),
                $row['username'],
                $row['password'],
                $row['email'],
                new DateTime($row['createdAt'])
            );
        }

        private function execute(string $sql, array $params)
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;
        }
    }