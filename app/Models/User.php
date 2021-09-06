<?php


namespace app\Models;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $senha;

    /**
     * @param int|null  $id
     * @param string    $username
     * @param string $email
     * @param string    $senha
     */
    public function __construct(?int $id, string $username, string $email, string $senha)
    {
        $this->id = $id;
        $this->username = strtolower($username);
        $this->email = $email;
        $this->senha = password_hash($senha,PASSWORD_DEFAULT);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }
    
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'senha' => $this->senha,
        ];
    }
}
