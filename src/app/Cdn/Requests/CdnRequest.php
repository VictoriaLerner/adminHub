<?php

namespace App\CDN\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\CDN\DTO\CreateCdnData;

class CdnRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'login'     => 'required|string|max:255',
            'password'  => 'required|string|min:6',
        ];
    }


    public function getData(): CreateCdnData
    {
        return new CreateCdnData(
            name: $this->input('name'),
            login: $this->input('login'),
            password: $this->input('password'),
        );
    }
}
