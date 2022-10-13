<?php

declare(strict_types=1);

namespace App\Http\Requests\Tender;

use App\Models\Tender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TenderUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'external_code' => 'string|min:9|max:9',
            'number' => 'string',
            'status' => ['string', Rule::in(Tender::STATUSES)],
            'name' => 'string',
            'update_date' => 'date_format:Y-m-d H:i:s',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
