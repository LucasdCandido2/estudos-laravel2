<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginSubmit(Request $request)
    {
        //form validation
        $request->validate(
            //rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            // error messages
            [
                'text_username.required' => 'O username é obrigatorio',
                'text_username.email' => 'Username deve ser um email valido',
                'text_password.required' => 'O password é obrigatorio',
                'text_password.min' => 'A password deve ter pelo menos :min caracteres',
                'text_password.max' => 'A password deve ter no maximo :max caracteres',
            ]
        );
        //get user input
        $username = $request->input('text_username');
        $username = $request->input('text_password');
        // echo 'ok';

        //text database connection
        try {
            DB::connection()->getPdo();
            echo "Connection is ok";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        echo "FIM";
        
    }
    public function logout()
    {
        echo 'logout';
    }
}
