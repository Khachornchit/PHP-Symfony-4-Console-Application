<?php

namespace Console\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Console\App\Repository\UserRepository;
use Doctrine\ORM\Repository\RepositoryFactory;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userpassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserpassword(): ?string
    {
        return $this->userpassword;
    }

    public function setUserpassword(string $userpassword): self
    {
        $this->userpassword = $userpassword;

        return $this;
    }

    /**
     * @param $requestContent
     * @return User
     */
    public static function create($requestContent): self
    {
        $data = json_decode($requestContent, true);
        $created = new self();
        if (isset($data["username"])) $created->setUsername($data["username"]);
        if (isset($data["userpassword"])) $created->setUserpassword($data["userpassword"]);

        return $created;
    }

    /**
     * @param $requestContent
     * @param User $updated
     * @return User
     */
    public static function update($requestContent, $updated): self
    {
        $data = json_decode($requestContent, true);
        if (isset($data["username"])) $updated->setUsername($data["username"]);
        if (isset($data["userpassword"])) $updated->setUserpassword($data["userpassword"]);

        return $updated;
    }

    /**
     * @param $username
     * @param $password
     * @return User
     */
    public static function consoleCreate($username, $password): self
    {
        $created = new self();
        if (isset($username)) $created->setUsername($username);
        if (isset($password)) $created->setUserpassword($password);

        return $created;
    }
}
