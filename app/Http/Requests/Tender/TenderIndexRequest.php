<?php

declare(strict_types=1);

namespace App\Http\Requests\Tender;

use Illuminate\Foundation\Http\FormRequest;

class TenderIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'update_date' => 'date_format:Y-m-d',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
