<?php

namespace app\Cdn\Actions;
use App\Models\Cdn;
use App\Cdn\DTO\CreateCdnData;
use Illuminate\Support\Facades\Crypt;
class UpdateCdnAction
{
    public function execute(Cdn $cdn, CreateCdnData $data): Cdn
    {
        $updateData = [
            'name'  => $data->name,
            'login' => $data->login,
        ];


        if (!empty($data->password)) {
            $updateData['password'] =  Crypt::encryptString($data->password);
        }

        $cdn->update($updateData);

        return $cdn;
    }
}
