<?php namespace Process\Http\Requests;

use Process\Http\Requests\Request;

class CreateTaskRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|string|min:4',
            'group_id' => 'required|integer|exists:groups,id'
		];
	}

}
