<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\LogoutMiddleware;
use App\Models\Connexion;
use App\Models\User;
use App\Utils\View;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new LogoutMiddleware(), ['index', 'login']);
        $this->registerMiddleware(new LoginMiddleware(), 'logout');
    }

    public function index()
    {
        return View::make("auth_layout", 'login');
    }

    public function login()
    {

        $username = request()->get('username');
        $password = request()->get('password');

        try {
            if (empty($username) || empty($password)) {
                throw new \Exception('all feild are required');
            }

            $userModel = new User();
            $user = $userModel->login($username, $password);
            unset($user['password']);



            // insert this connexion to the database
            $connexionModel = new Connexion();
            $connexionModel->insert([
                'user_id' => $user['id'],
                'nom_complet' => "{$user['nom_fr']} {$user['prenom_fr']}",
                'role' => $user['role']['name_fr'],
                'description' => ''
            ]);

            auth()->login($user['id']); // save the user in the session
            return redirect('/admin/dashboard');
        } catch (\Throwable $th) {

            session()->put('error', $th->getMessage());
            return redirect('/admin/login');

        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/admin/login');
    }
}