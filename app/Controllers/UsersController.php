<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Role;
use App\Models\User;
use App\Utils\View;


class UsersController extends Controller
{
    private $user;
    private $role;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());
        $this->registerMiddleware(new RoleMiddleware(["SA"]));

        $this->user = new User();
        $this->role = new Role();
    }
    public function index()
    {

        
        $users = $this->user->getUsers() ?? [];
        return View::make('admin_panel/layout', "users/index", compact('users'));
    }

    public function create()
    {

        $roles = $this->role->select(['id', 'name_fr'], 'id != 1');
        return View::make('admin_panel/layout', "users/add_user", compact('roles'));
    }

    public function store()
    {
        $requiredFields = ['nom_fr', 'prenom_fr', 'nom_ar', 'prenom_ar', 'email', 'tele', 'username', 'password', 'role'];


        $user = request()->only($requiredFields);
        $errors = [];
        // validate if there is a required field missing
        foreach ($requiredFields as $field) {
            if ($user[$field] === null) {
                $errors[$field] = "$field est obligatoire";
            }
        }


        // check username
        if ($user['username']) {
            $exists = $this->user->selectFirst(['username'], "username = :username", ['username' => $user['username']]);
            if ($exists) {
                $errors["username"] = "username est dejat existe";
            }
        }

        // check email
        if ($user['email']) {
            $exists = $this->user->selectFirst(['email'], "email = :email", ['email' => $user['email']]);
            if ($exists) {
                $errors["email"] = "email est dejat existe";
            }
        }

        // check role exists
        $exists = $this->role->selectFirst(null, "id = :id and id != 1", ['id' => $user['role']]);
        if (!$exists) {
            $errors["role"] = "role n'existe pas";
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect("/admin/users/create");
        }

        // every thing is valid
        $user = [...$user, 'role_id' => $user['role'], 'password' => password_hash($user['password'], null)];

        unset($user['role']);

        $id = $this->user->insert($user);

        if ($id) {
            return redirect('admin/users');
        }
        return redirect('admin/users/create');

    }

    public function edit($id)
    {
        if (!$id)
            return redirect('admin/users');

        $user = $this->user->selectFirst(null, 'id = :id', ['id' => $id]);
        if (!$user)
            return redirect('admin/users');
        $roles = $this->role->select(null, 'id != 1');
        return View::make('admin_panel/layout', "users/edit_user", compact('user', 'roles'));
    }

    public function update($user_id)
    {
        $requiredFields = ['nom_fr', 'prenom_fr', 'nom_ar', 'prenom_ar', 'email', 'tele', 'username', 'role'];
        $optionalFields = ['password'];

        $user = request()->only([...$requiredFields, ...$optionalFields]);
        $errors = [];
        // validate if there is a required field missing
        foreach ($requiredFields as $field) {
            if ($user[$field] === null) {
                $errors[$field] = "$field est obligatoire";
            }
        }


        // check username
        if ($user['username']) {
            $exists = $this->user->selectFirst(['username'], "username = :username and id != :id", ['username' => $user['username'], 'id' => $user_id]);
            if ($exists)
                $errors["username"] = "username est dejat existe";
        }

        // check email
        if ($user['email']) {
            $exists = $this->user->selectFirst(['email'], "email = :email and id != :id", ['email' => $user['email'], 'id' => $user_id]);
            if ($exists) {
                $errors["email"] = "email est dejat existe";
            }
        }

        // check role exists
        if ($user['role']) {
            $exists = $this->role->selectFirst(null, "id = :id and id != 1", ['id' => $user['role']]);
            if (!$exists) {
                $errors["role"] = "role n'existe pas";
            }
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect("/admin/users/$user_id/edit");
        }

        // every thing is valid

        $user['role_id'] = $user['role'];
        unset($user['role']);

        if ($user['password']) {
            $user['password'] = password_hash($user['password'], null);
        } else {
            unset($user['password']);
        }

        // return json_encode($user);

        $this->user->update($user, $user_id);
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $deleteCount = $this->user->safeDelete($id);

        return redirect('admin/users');
    }


    public function setIsActive($id)
    {

        // die(json_encode(request()->only(['user_id','is_active'])));
        $isActive = (boolean) request()->get('is_active');

        $this->user->setIsActive($id, $isActive);

        return redirect('admin/users');
    }
}