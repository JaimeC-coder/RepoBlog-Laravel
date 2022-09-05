<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //    if ($this->user_id == auth()->user()->id) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // if ($this->user_id != auth()->user()->id) {
        //     //si el usuario no es el mismo que esta logeado no puede crear un post
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /**
         * TODO : Poder modificar las reglas de validacion trallendo al usuario autenticado sin necesidad de pasar el id del usuario
         **/


         $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];
        if ($post) {
            $rules['slug'] = "required|unique:posts,slug,$post->id";
        }
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                //array_merge agregara los elementos de un array a otro

                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'El slug ya existe',
            'status.required' => 'El campo estado es obligatorio',
            'status.in' => 'El campo estado no es valido',
            'file.image' => 'El archivo no es una imagen',
            'category_id.required' => 'El campo categoria es obligatorio',
            'tags.required' => 'El campo etiquetas es obligatorio',
            'extract.required' => 'El campo extracto es obligatorio',
            'body.required' => 'El campo cuerpo es obligatorio',
        ];
    }
}
