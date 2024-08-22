<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreInwardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'delivery_id'  => 'required',
            'letter_id' => 'required',
            'usertype' => 'required',
            'fromwhom' => 'required',
            'ward_id' => 'required',
            'subject' => 'required',
            'sendername_designation' => 'required',
            'letter_ref_no' => 'required',
            'recevied_data' => 'required',
            'letter_date' => 'required',
            'daily_date' => 'required',
            'file_upload'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'comments'=> 'required'
            // 'formatted_id'=>'required'
        ];
    }
}
