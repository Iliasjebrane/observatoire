<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Connexion;
use App\Utils\View;


class ConnexionsController extends Controller
{
    private $connexion;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());

        $this->registerMiddleware(new RoleMiddleware(["SA"]));
        $this->connexion = new Connexion();
    }
    public function index()
    {

        $connexions = $this->connexion->select(

        condition: "is_deleted = false",
        orderBy: "id DESC",

        ) ?? [];
        return View::make('admin_panel/layout', "connexions/index", compact('connexions'));
    }

    public function create()
    {
        return null;
    }

    public function store()
    {
        return null;
    }

    public function edit()
    {
        return null;
    }

    public function update()
    {
        return null;
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect("admin/connexions");
        }

        $this->connexion->safeDelete($id);

        return redirect("admin/connexions");
    }

}