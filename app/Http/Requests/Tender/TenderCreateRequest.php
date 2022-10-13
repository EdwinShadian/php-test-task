<?php

declare(strict_types=1);

namespace App\Http\Requests\Tender;

use App\Models\Tender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TenderCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'external_code' => 'string|min:9|max:9|required',
            'number' => 'string|required',
            'status' => ['required', 'string', Rule::in(Tender::STATUSES)],
            'name' => 'string|required',
            'update_date' => 'date_format:Y-m-d H:i:s|required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
