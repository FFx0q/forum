<?php
    namespace Society\Infrastructure\Persistence\Post;

    use PDO;
    use Society\Application\Core\Database;
    use Society\Domain\Post\Post;
    use Society\Domain\Post\PostBody;
    use Society\Domain\Post\PostId;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserId;

    class SqlPostRepository implements PostRepository
    {
        private PDO $pdo;

        public function __construct()
        {
            $this->pdo = Database::getFactory()->getConnection();
        }

        public function all(): array
        {
            $stmt = $this->execute('SELECT * FROM Post', []);

            return array_map(function($row) {
                return $this->build($row);
            }, $stmt->fetchALl(PDO::FETCH_ASSOC));
        }

        public function ofAuthor(UserId $id): array
        {
            $stmt = $this->execute('SELECT * FROM Post WHERE author=:author', [
                'author' => $id->id()
            ]);

            return array_map(function($row) {
                return $this->build($row);
            }, $stmt->fetchAll(PDO::FETCH_ASSOC));
        }

        private function build($row): Post
        {
            return new Post(
                new PostId($row['id']),
                new UserId($row['author']),
                new PostBody($row['content']),
                $row['createdAt'],
                $row['updatedAt']
            );
        }

        private function execute(string $sql, array $params): \PDOStatement
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;
        }
    }