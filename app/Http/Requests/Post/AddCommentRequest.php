<?php

namespace App\Http\Requests\Post;

use App\Services\Post\Data\AddCommentData;
use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment' => ['required', 'max:255'],
        ];
    }

    public function data(): AddCommentData
    {
        return AddCommentData::from([
            'comment' => $this->input('comment'),
            'user_id' => auth()->id(),
        ]);
    }
}
