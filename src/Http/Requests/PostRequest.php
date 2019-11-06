<?php

namespace Scaffolder\Scafold\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest { 
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'title' => 'required|max:80',
            'content' => 'required',
		];
	}
}