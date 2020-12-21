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
        const DATE_FORMAT = 'Y-m-d H:i:s';
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function all(): array
        {
            $stmt = $this->execute('SELECT * FROM Post ORDER BY createdAt DESC', []);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchALl());
        }

        public function ofAuthor(UserId $id): array
        {
            $stmt = $this->execute('SELECT * FROM Post WHERE author=:author ORDER BY createdAt DESC', [
                'author' => $id->id()
            ]);

            return array_map(function ($row) {
                return $this->build($row);
            }, $stmt->fetchAll());
        }

        public function save(Post $post)
        {
            $sql = 'INSERT INTO Post VALUES(:id, :author, :body, :createdAt, :updatedAt)';
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
                new PostBody($row['content']),
                new DateTime($row['createdAt']),
                new DateTime($row['updatedAt'])
            );
        }

        private function execute(string $sql, array $params): \PDOStatement
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;
        }
    }
