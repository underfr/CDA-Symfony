<?php

namespace App\Service;

use App\Entity\UserEntity;
use App\Repository\UserRepository;

class UserService
{

    public function __construct(
        private UserRepository $userRepository
    ){

    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAll() ?? [];
    }

    public function getUserById(int $id): ?UserEntity
    {
        return $this->userRepository->find($id) ?? null;
    }

}
