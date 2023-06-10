<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Operation;
use App\Models\Population;
use App\Models\Rapport;
use App\Utils\View;




class PopulationsController extends Controller
{
    private $population;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());

        $this->registerMiddleware(new RoleMiddleware(["SA", "STC", "CS"]));

        $this->population = new Population();
    }

    public function index()
    {

        $condition = 'is_deleted = false';
        $populations = $this->population->select(

        condition: $condition,
        orderBy: "id DESC",

        ) ?? [];
        return View::make('admin_panel/layout', "populations/index", compact('populations'));

    }



    public function create()
    {
        return View::make('admin_panel/layout', "populations/add_population");
    }

    public function store()
    {


        $required_fields = ['type', 'number', 'date'];

        foreach ($required_fields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = 'Ce champ est obligatoire';
            }
        }

        if (!in_array(request()->get('type'), ['M', 'F', "H", "S"])) {
            $errors['type'] = 'Ce champ est obligatoire';
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect('/admin/populations/create');
        }
        $population = request()->only($required_fields);

        $id = $this->population->insert($population);
        $population['id'] = $id;
        return redirect("admin/populations");
    }

    public function edit($id)
    {

        if (!$id)
            return view_404();


        $population = $this->population->selectFirst(null, 'id = :id', ['id' => $id]);

        if (!$population)
            return view_404();

        return View::make('admin_panel/layout', "populations/edit_population", compact('population'));
    }

    public function update($id)
    {

        if (!$id || !$this->population->selectFirst(null, 'id=:id', ['id' => $id])) {
            return view_404();
        }

        $required_fields = ['type', 'number', 'date'];
        foreach ($required_fields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = 'Ce champ est obligatoire';
            }
        }

        if (!in_array(request()->get('type'), ['M', 'F', "H", "S"])) {
            $errors['type'] = 'Ce champ est obligatoire';
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect("/admin/populations/$id/edit");
        }
        $population = request()->only($required_fields);

        $this->population->update($population, $id);

        return redirect("admin/populations");

    }

    
    public function show($id)
    {
        $population = $this->population->find($id);
        if(!$population){
            view_404();
        }
        $operations = (new Operation)->getOperations(Population::table(), $id);
        return View::make('admin_panel/layout', "populations/show", compact('population', 'operations'));
    }
    public function destroy($id)
    {
        if (!$id) {
            return redirect("admin/populations");
        }

        $this->population->safeDelete($id);

        return redirect("admin/populations");
    }

}