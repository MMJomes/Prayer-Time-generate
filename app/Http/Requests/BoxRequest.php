<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BoxRequest extends FormRequest
{
    public function rules()
    {
        if ($this->box) {
            return [
                'name' => 'required',
                'prayerzone' => 'required',
                'subscriber_id' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'prayerzone' => 'required',
                'subscriber_id' => 'required',

            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'prayerzone.required' => 'Prayerzone is required',
            'subscriber_id.required' => 'Subscriber is required',
        ];
    }
}
