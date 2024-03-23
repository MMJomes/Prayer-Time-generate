<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    public function rules()
    {
        if ($this->subscriber) {
            return [
                'name' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
        ];
    }
}
