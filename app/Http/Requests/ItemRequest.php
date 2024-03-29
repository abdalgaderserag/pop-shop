<?php

namespace App\Http\Requests;

use App\Rules\CategoryExsist;
use App\Rules\ImagesUploaded;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'details' => ['required', 'string', 'min:25', 'max:511'],
            'budget' => ['required', 'Numeric', 'min:1'],
            'images' => ['required', 'array', 'min:4', 'max:6', new ImagesUploaded()],
            'stock' => ['Numeric', 'max:255'],
            'base_type' => ['required', 'string', new CategoryExsist()],
            'seconder_type' => ['required', 'string', 'min:3', 'max:255'],
            'location' => ['required', 'string', 'min:6', 'max:255'],
            'exchangeable' => ['boolean'],
            'used' => ['boolean'],
            'unlimited' => ['boolean'],
        ];
    }
}
