<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Middlewares\RoleMiddleware;
use App\Models\Article;
use App\Models\Operation;
use App\Utils\FileUploader;
use App\Utils\View;


class ArticlesController extends Controller
{
    private $article;
    private $db;
    public function __construct()
    {

        $this->registerMiddleware(new LoginMiddleware());
        $this->registerMiddleware(new RoleMiddleware(["SA", "ART", "CS"]));

        $this->article = new Article();
        $this->db = \App\Database\DB::instance();
    }

    public function index()
    {

        $condition = 'is_deleted = false';
        $articles = $this->article->select(
            condition: $condition,
            orderBy: "id DESC",
        ) ?? [];
        return View::make('admin_panel/layout', "articles/index", compact('articles'));

    }



    public function create()
    {
        return View::make('admin_panel/layout', "articles/add_article");
    }

    public function store()
    {

        $required_fields = ['title_ar', 'description_ar'];
        foreach ($required_fields as $field)
            if (!request()->has($field))
                $errors[$field] = 'Ce champ est obligatoire';
        try {
            if (!isset($_FILES['image']) || $_FILES['image']['size'] <= 0)
                throw new \Exception('Ce champ est obligatoire');
            $fileUploader = new FileUploader();
            $image = $fileUploader->uploadOne($_FILES['image'], ["jpeg", 'jpg', 'png']);

        } catch (\Throwable $th) {
            $errors['image'] = $th->getMessage();
        }
        if (!empty($errors)) {
            setErrors($errors);
            return redirect('/admin/articles/create');
        }
        $article = request()->only([...$required_fields, 'title_fr', 'description_fr']);

        $article['image'] = $image;

        $this->article->insert($article);

        return redirect("admin/articles");

    }

    public function edit($id)
    {

        if (!$id)
            return view_404();


        $article = $this->article->selectFirst(null, 'id = :id', ['id' => $id]);

        if (!$article)
            return view_404();

        return View::make('admin_panel/layout', "articles/edit_article", compact('article'));
    }

    public function update($id)
    {

        if (!$id || !$this->article->selectFirst(null, 'id=:id', ['id' => $id])) {
            return view_404();
        }

        $required_fields = ['title_ar', 'description_ar'];
        foreach ($required_fields as $field) {
            if (!request()->has($field)) {
                $errors[$field] = 'Ce champ est obligatoire';
            }
        }




        $article = request()->only([...$required_fields, 'title_fr', 'description_fr']);
        try {


            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $fileUploader = new FileUploader();
                $image = $fileUploader->uploadOne($_FILES['image'], ["jpeg", 'jpg', 'png']);
                $article['image'] = $image;
            }
        } catch (\Throwable $th) {
            $errors['image'] = $th->getMessage();
        }

        if (!empty($errors)) {
            setErrors($errors);
            return redirect("/admin/articles/$id/edit");
        }

        $this->article->update($article, $id);

        return redirect("admin/articles");

    }


    public function show($id)
    {
        $article = $this->article->find($id);
        if (!$article) {
            view_404();
        }
        $operations = (new Operation)->getOperations(Article::table(), $id);
        return View::make('admin_panel/layout', "articles/show", compact('article', 'operations'));
    }
    public function destroy($id)
    {
        if (!$id) {
            return redirect("admin/articles");
        }

        $this->article->safeDelete($id);

        return redirect("admin/articles");
    }

}