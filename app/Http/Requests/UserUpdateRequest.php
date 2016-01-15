<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UserUpdateRequest extends Request
{
    public function __construct(Route $route)
    {
        $this -> route = $route;
    }
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
            'name'  => 'min:4|max:120|required',
            'email'  => 'min:4|max:120|email|required|unique:users,email,'.$this->route->getParameter('users'),
            'type'  => 'required|in:super,admin,cajero,almacenista,taller,propietario'
        ];
    }
}
