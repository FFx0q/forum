<?php
    namespace Society\Infrastructure\Persistence\Post;

    use PDO;
    use DateTime;
    use Society\Domain\Post\Post;
    use Society\Domain\Post\PostBody;
    use Society\Domain\Post\PostId;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserId;

    class SqlPostRepository implements PostRepository
    {
        const QUERY = "SELECT id, author, body, created_at, updated_at FROM Posts";
        const DATE_FORMAT = 'Y-m-d H:i:s';
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function all(): array
        {
            $stmt = $this->execute(self::QUERY . ' ORDER BY created_at DESC', []);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchALl());
        }

        public function ofAuthor(UserId $id): array
        {
            $stmt = $this->execute(self::QUERY . ' WHERE author=:author ORDER BY created_at DESC', [
                'author' => $id->id()
            ]);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll());
        }

        public function save(Post $post)
        {
            $sql = 'INSERT INTO Posts VALUES(:id, :author, :body, :createdAt, :updatedAt)';
            return $this->execute($sql, [
                'id' => $post->id->id(),
                'author' => $post->author->id(),
                'body' => $post->body->content(),
                'createdAt' => $post->createdAt->format(self::DATE_FORMAT),
                'updatedAt' => $post->updatedAt->format(self::DATE_FORMAT)
            ]);
        }

        private function build($row): Post
        {
            return new Post(
                new PostId($row['id']),
                new UserId($row['author']),
                new PostBody($row['body']),
                new DateTime($row['created_at']),
                new DateTime($row['updated_at'])
            );
        }

        private function execute(string $sql, array $params): \PDOStatement
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;
        }
    }
