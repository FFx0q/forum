<?php
    namespace Society\Domain\User;

    use DateTime;
    use JsonSerializable;

    class User implements JsonSerializable
    {
        public UserId $id;
        public string $login;
        public string $password;
        public string $email;
        public ?DateTime $createdAt;

        public function __construct(UserId $id, $login, $password, $email, DateTime $createdAt = null)
        {
            $this->id = $id;
            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
            $this->createdAt = $createdAt ?: new DateTime();
        }

        public function jsonSerialize(): array
        {
            return [
                'id' => $this->id->id(),
                'login' => $this->login,
                'email' => $this->email,
                'createdAt' => $this->createdAt->format('Y-m-d H:i:s')
            ];
        }
    }
