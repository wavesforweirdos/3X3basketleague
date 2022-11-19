<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return view('welcome');
        } else {
            if (isset($_POST['signup'])) {
                //el ususario quiere registrarse
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

                // $user = new User($username, $password);

                if (!isset($_SESSION)) {
                    session_start();
                }

            } elseif (isset($_POST['signin'])) {
                //el ususario quiere acceder a su entidad
                return view('signin');


                //si existe el usuario y coincide con su contraseña => dirigir al controlador de la entidad
                //si existe el usuario pero no coincide con la contrasela =>  mandar error de identificación (usario y contraseña no coinciden)
                //si no existe el usuario => mandar error de identificación (no existe ningún usario con esas datos)
            };
        }
    }

    public function create()
    {
        return view('user.create-entity');
    }

    public function show($entity)
    {
        return view('entity.index', compact('entity'));
    }
}
