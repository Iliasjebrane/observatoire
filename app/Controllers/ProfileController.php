<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Role;
use App\Models\User;
use App\Utils\View;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());
    }

    public function index()
    {
        return View::make('admin_panel/layout', 'profile/index');
    }


    public function changePassword()
    {
        $user_id = auth()->user()['id'];

        $old_pass = request()->get('old_pass');
        $new_pass = request()->get('new_pass');

        $errors = [];
        if (!$old_pass) {
            $errors['old_pass'] = "ce champ est oblegatoire";
        }
        if (!$new_pass) {
            $errors['new_pass'] = "ce champ est oblegatoire";
        }

        if (!empty($errors)) {
            setErrors($errors);
            redirect("admin/profile");
            return;
        }

        // die("valid data");
        $userModel = new User();
        $user = $userModel->selectFirst(null, "id=:id", ['id' => $user_id]);
        if (!password_verify($old_pass, $user['password'])) {
            $errors['old_pass'] = 'mot de pass incorrect';
            setErrors($errors);
            redirect("admin/profile");
            return;
        }

        // change password 
        $updated = $userModel->update(['password' => password_hash($new_pass, null)], $user_id);

        if ($updated) {
            setMessage('success', 'password changed successfully');
        } else {
            setMessage('error', 'something went wrong!');
        }
        redirect('admin/profile');

    }
}