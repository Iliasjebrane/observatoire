<?php


namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Operation;
use App\Utils\FileUploader;
use App\Utils\View;

use App\Models\Partner;

class PartnersController extends Controller
{

    /** @var Partner $partner*/
    private $partner;
    public function __construct()
    {
        $this->registerMiddleware(new LoginMiddleware);
        $this->registerMiddleware(new RoleMiddleware(['SA']));

        $this->partner = new Partner;
    }
    public function index()
    {
        $partners = $this->partner->select(condition: 'is_deleted=false') ?? [];
        return View::make("admin_panel/layout", 'partners/index', compact('partners'));
    }

    public function create()
    {
        return View::make("admin_panel/layout", 'partners/add_partner');
    }

    public function store()
    {

        $requiredFields = ['intitule', 'adresse', 'tele'];
        $errors = [];
        foreach ($requiredFields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = "ce champs est obligatoire";
            }
        }
        if (!request()->fileExists('image')) {
            $errors['image'] = "ce champs est obligatoire";
        }

        if (!empty($errors)) {
            setErrors($errors);
            redirect('/admin/partners/create');
        }


        try {
            $fileUpload = new FileUploader();
            $filename = $fileUpload->uploadOne(request()->file('image'), ['jpg', 'png', 'jpeg']);

        } catch (\Throwable $th) {
            setErrors(['image' => $th->getMessage()]);
            redirect('admin/partners/create');
        }

        $partnerData = request()->only($requiredFields);
        $partnerData['image'] = $filename;

        $this->partner->insert($partnerData);
        redirect('/admin/partners');

    }

    public function edit($id)
    {
        if (!$id)
            view_404();

        $partner = $this->partner->selectFirst(condition: "id=:id", conditionParams: ['id' => $id]);
        if (!$partner)
            view_404();

        return View::make('admin_panel/layout', 'partners/edit_partner', compact('partner'));
    }

    public function update($id)
    {
        if (!$id)
            throw new \Exception("action failed because the id is not found in the database");

        $requiredFields = ['intitule', 'adresse', 'tele'];
        $errors = [];
        foreach ($requiredFields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = "ce champs est obligatoire";
            }
        }

        if (!empty($errors)) {
            setErrors($errors);
            redirect("/admin/partners/$id/edit");
        }

        $partnerData = request()->only($requiredFields);

        if (request()->fileExists('image')) {
            try {
                $fileUpload = new FileUploader();
                $filename = $fileUpload->uploadOne(request()->file('image'), ['jpg', 'png', 'jpeg']);
                $partnerData['image'] = $filename;
            } catch (\Throwable $th) {
                setErrors(['image' => $th->getMessage()]);
                redirect("/admin/partners/$id/edit");
            }
        }
        $this->partner->update($partnerData, $id);
        redirect('/admin/partners');
    }


    public function show($id)
    {
        $partner = $this->partner->find($id);
        if(!$partner){
            view_404();
        }
        $operations = (new Operation)->getOperations(Partner::table(), $id);
        return View::make('admin_panel/layout', "partners/show", compact('partner', 'operations'));
    }
    public function destroy($id)
    {
        $this->partner->safeDelete($id);
        redirect('/admin/partners');
    }
}