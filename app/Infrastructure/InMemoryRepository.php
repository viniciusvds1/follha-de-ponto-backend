<?php

namespace app\Infrastructure;

use PDOException;
use app\Models\User;
use app\Database\Connection;
use app\Models\UserRepository;
use app\Models\UserNotFoundException;

class InMemoryRepository implements UserRepository
{
    
    /**
     * @var User[]
     */
    private $users;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->connection = Connection::connection();
        $this->users = $users ?? [
            1 => new User(1, 'vinicius', 'viniciusvds-@hotmail.com', '123456'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }
   
    public function findBy($field, $value)
    {
        $prepared = $this->user->findOne($field, $value);

        $prepared->bindValue(":{$field}", $value);

        return $prepared;
        

    }
}