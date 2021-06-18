<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/grano';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/'],
            'apellido' => ['required', 'string', 'max:255', 'regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/'],
            'telefono' => ['required', 'string', 'max:255', 'regex:/^[0-9]+$/'],
            'apartamento' => ['required', 'string', 'max:255', 'regex:/^[0-9]+$/', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', 'unique:users'],
            'alicuota' => ['string', 'max:255', 'regex:/^[0-9]+$/'],
            'rol' => ['required', 'string', 'max:255', 'regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'codigo' => ['required', 'string', 'regex:/EdifGranoXLZÑ-/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'apartamento' => $data['apartamento'],
            'email' => $data['email'],
            'alicuota' => $data['alicuota'],
            'rol' => $data['rol'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
