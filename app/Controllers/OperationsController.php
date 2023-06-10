<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Operation;
use App\Utils\View;


class OperationsController extends Controller
{
    private $operation;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());

        $this->registerMiddleware(new RoleMiddleware(["SA"]));

        $this->operation = new Operation();

    }
    public function index()
    {

        $operations = $this->operation->select(
        condition: "is_deleted = FALSE",
        orderBy: "id DESC",
        ) ?? [];
        return View::make('admin_panel/layout', "operations/index", compact('operations'));

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
            return redirect("admin/operations");
        }

        $this->operation->safeDelete($id);

        return redirect("admin/operations");
    }

}