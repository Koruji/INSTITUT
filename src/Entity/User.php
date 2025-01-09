<?php
// src/Entity/User.php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass=UserRepository::class)
*/
class User implements UserInterface
{
// Ajoute tes propriétés comme le mot de passe et l'email

/**
* @ORM\Id()
* @ORM\GeneratedValue()
* @ORM\Column(type="integer")
*/
private $id;

/**
* @ORM\Column(type="string", length=255)
*/
private $email;

/**
* @ORM\Column(type="string", length=255)
*/
private $password;

// Implémentation des méthodes de UserInterface

public function getUsername(): string
{
return $this->email;  // Ici, on utilise l'email comme identifiant
}

public function getRoles(): array
{
// Retourne un tableau avec les rôles de l'utilisateur
return ['ROLE_USER'];
}

public function getPassword(): string
{
return $this->password;
}

public function getSalt(): ?string
{
// Si tu utilises bcrypt ou argon2, tu n'as pas besoin de cette méthode
return null;
}

public function eraseCredentials()
{
// Si tu stockes des informations sensibles (comme un mot de passe temporaire),
// tu peux les effacer ici.
}

// Getter et Setter pour tes propriétés...
    public function getUserIdentifier(): string
    {
        // TODO: Implement getUserIdentifier() method.
    }
}
