<?php

namespace App\Http\Requests;

use App\Models\ChecklistComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateChecklistCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('checklist_comment_edit');
    }

    public function rules()
    {
        return [];
    }
}
