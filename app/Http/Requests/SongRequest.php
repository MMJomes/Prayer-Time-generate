<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    public function rules()
    {

        if ($this->song) {
            return [
                'name' => 'required',
                'prayerzone' => 'required',
                'subscriber_id' => 'required',
                'box_id' => 'nullable',
                'prayertimedate' => 'nullable',
                'prayertimeseq' => 'nullable',
                'prayertime' => 'nullable',
            ];
        } else {
            return [
                'name' => 'required',
                'prayerzone' => 'required',
                'subscriber_id' => 'required',
                'box_id' => 'nullable',
                'prayertimedate' => 'nullable',
                'prayertimeseq' => 'nullable',
                'prayertime' => 'nullable',


            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'prayerzone.required' => 'Prayerzone is required',
            'subscriber_id.required' => 'Subscriber is required',
            'box_id.required' => 'Box is required',
            'prayertimedate.required' => 'Prayertimedate is required',
            'prayertimeseq.required' => 'Prayertimeseq is required',
            'prayertime.required' => 'Prayertime is required',
        ];
    }
}
