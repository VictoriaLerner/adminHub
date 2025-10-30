<?php
namespace App\Cdn\DTO;



class CreateCdnData
{
    public function __construct(
        public string $name,
        public string $login,
        public string $password
    ) {}
}
