<?php
    namespace Society\Infrastructure\Persistence\User;

    use DateTime;
    use PDO;
    use Society\Domain\User\User;
    use Society\Domain\User\UserId;
    use Society\Domain\User\UserRepository;

    class SqlUserRepository implements UserRepository
    {
        const DATE_FORMAT = 'Y-m-d H:i:s';
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function all(): array
        {
            $stmt = $this->execute('SELECT * FROM User', []);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll());
        }

        public function ofLogin(string $login)
        {
            $stmt = $this->execute('SELECT * FROM User WHERE login = :login', [
                'login' => $login
            ]);
            $row = $stmt->fetch();

            if ($row === false) {
                return;
            }

            return $this->build($row);
        }

        public function ofId(UserId $id): User
        {
            $stmt = $this->execute('SELECT * FROM User WHERE id = :id', [
                'id' => $id->id()
            ]);

            return $this->build($stmt->fetch());
        }

        public function remove(User $u)
        {
            return $this->execute('DROP User WHERE id=:id', [
                'id' => $u->id->id()
            ]);
        }

        public function save(User $u)
        {
            $sql = 'INSERT INTO User VALUES (:id, :login ,:password ,:email ,:createdAt)';

            return $this->execute($sql, [
                'id' => $u->id,
                'login' => $u->login,
                'password' => $u->password,
                'email' => $u->email,
                'createdAt' => $u->createdAt->format(SELF::DATE_FORMAT)
            ]);
        }

        public function update(User $u)
        {
            $sql = 'UPDATE User SET login=?, password=?, email=?, createdAt=? WHERE id=?';
            $this->execute($sql, [
                $u->login, $u->password, $u->email, $u->createdAt, $u->id->id()
            ]);
        }

        private function build($row): User
        {
            return new User(
                new UserId($row['id']),
                $row['login'],
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
