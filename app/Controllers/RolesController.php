<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Role;
use App\Utils\View;


class RolesController extends Controller
{
    private $role;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());
        $this->registerMiddleware(new RoleMiddleware(["SA"]));
$this->role=new Role();
    }
    public function index()
    {
        $roles = $this->role->select();
        return View::make('admin_panel/layout', "roles/index", compact('roles'));
    }

}