<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Operation;
use App\Models\Rapport;
use App\Utils\FileUploader;
use App\Utils\View;


class RapportsController extends Controller
{
    private $rapport;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware());

        $this->registerMiddleware(new RoleMiddleware(["SA", "RPT", "CS"]));

        $this->rapport = new Rapport();
    }


    public function index()
    {
        $condition = 'is_deleted = false';

        $rapports = $this->rapport->select(
            condition: $condition,
            orderBy: "id DESC",
        ) ?? [];
        return View::make('admin_panel/layout', "rapports/index", compact('rapports'));
    }

    public function create()
    {
        return View::make('admin_panel/layout', "rapports/add_rapport");
    }

    public function store()
    {


        $required_fields = ['intitule', 'annee'];
        foreach ($required_fields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = 'Ce champ est obligatoire';
            }
        }

        if (!isset($_FILES['piece_jointe'])) {
            $errors['piece_jointe'] = 'Ce champ est obligatoire';
        }

        // upload the piece joint

        try {
            $fileUploader = new FileUploader();
            $piece_jointe = $fileUploader->uploadOne($_FILES['piece_jointe'], ["jpeg", 'jpg', 'png']);
        } catch (\Throwable $th) {
            $errors['piece_jointe'] = $th->getMessage();
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect('/admin/rapports/create');
        }
        $rapport = request()->only(['intitule', 'annee', 'description']);

        $rapport['piece_jointe'] = $piece_jointe;
        // create a new rapport in the database

        $id = $this->rapport->insert($rapport);
        $rapport['id'] = $id;
        return redirect("admin/rapports");
    }

    public function edit($id)
    {
        if (!$id)
            return view_404();

        $rapport = $this->rapport->selectFirst(null, 'id = :id', ['id' => $id]);

        if (!$rapport)
            return view_404();

        return View::make('admin_panel/layout', "rapports/edit_rapport", compact('rapport'));
    }

    public function update($id)
    {

        try {
            if (!$id || !$this->rapport->selectFirst(null, 'id=:id', ['id' => $id])) {
                return view_404();
            }

            $required_fields = ['intitule', 'annee'];
            foreach ($required_fields as $field) {
                if (!request()->has($field)) {
                    $errors[$field] = 'Ce champ est obligatoire';
                }
            }



            if (!empty($errors)) {
                setErrors($errors);
                return redirect('/admin/rapports/create');
            }

            $rapport = request()->only(['intitule', 'annee', 'description']);

            // upload the piece joint
            // die(json_encode($_FILES['piece_jointe']));
            if (request()->fileExists('piece_jointe')) {
                $fileUploader = new FileUploader();
                $piece_jointe = $fileUploader->uploadOne($_FILES['piece_jointe'], ["jpeg", 'jpg', 'png']);
                $rapport['piece_jointe'] = $piece_jointe;
            }

            // create a new rapport in the database
            $this->rapport->update($rapport, $id);
            // redirect to the index page if rapports
            return redirect("admin/rapports");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function show($id)
    {
        $rapport = $this->rapport->find($id);
        if(!$rapport){
            view_404();
        }
        $operations = (new Operation)->getOperations(Rapport::table(), $id)??[];
        return View::make('admin_panel/layout', "rapports/show_rapport", compact('rapport', 'operations'));
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect("admin/rapports");
        }
        $this->rapport->safeDelete($id);
        return redirect("admin/rapports");
    }

}