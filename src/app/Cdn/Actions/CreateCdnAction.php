<?php

namespace app\Cdn\Actions;
use Illuminate\Support\Facades\Hash;
use App\Models\Cdn;
use App\Cdn\DTO\CreateCdnData;
use Illuminate\Support\Facades\Crypt;

class CreateCdnAction
{
    public function execute(CreateCdnData $data): Cdn
    {
        return Cdn::create([
            'name' => $data->name,
            'login' => $data->login,
            'password' =>  Crypt::encryptString($data->password),
        ]);
    }
}
