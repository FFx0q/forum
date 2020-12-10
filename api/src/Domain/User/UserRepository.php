<?php
    namespace Society\Domain\User;

    interface UserRepository 
    {
        public function ofId(UserId $id);
        public function ofUsername(string $username);
        public function remove(User $u);
        public function update(User $u);
        public function save(User $u);
        public function all();
    }