<?php
    namespace Society\Domain\User;

    use DateTime;

    class User
    {
        public UserId $id;
        public string $username;
        public string $password;
        public string $email;
        public ?DateTime $createdAt;

        public function __construct(UserId $id, $username, $password, $email, DateTime $createdAt = null)
        {
          $this->id = $id;
          $this->username = $username;
          $this->password = $password;
          $this->email = $email;
          $this->createdAt = $createdAt ?: new DateTime();
        }
    }