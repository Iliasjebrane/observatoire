<?php

use App\Controllers\ArticlesController;
use App\Controllers\AuthController;
use App\Controllers\ConnexionsController;
use App\Controllers\DashboardController;
use App\Controllers\OperationsController;
use App\Controllers\PartnersController;
use App\Controllers\PopulationsController;
use App\Controllers\ProfileController;
use App\Controllers\RapportsController;
use App\Controllers\RolesController;
use App\Controllers\UsersController;
use App\Utils\Route;

$prefix = "/admin";

Route::get("$prefix/login", [AuthController::class, "index"]);

Route::post("$prefix/login", [AuthController::class, "login"]);
Route::post("$prefix/logout", [AuthController::class, "logout"]);

Route::get("$prefix/dashboard", [DashboardController::class, "index"]);

// users resources
Route::get("$prefix/users", [UsersController::class, "index"]);
Route::get("$prefix/users/create", [UsersController::class, "create"]);
Route::post("$prefix/users", [UsersController::class, "store"]);
Route::get("$prefix/users/{id}/edit", [UsersController::class, "edit"]);
Route::put("$prefix/users/{id}", [UsersController::class, "update"]);
Route::delete("$prefix/users/{id}", [UsersController::class, "destroy"]);
Route::post("$prefix/users/set_is_active/{id}", [UsersController::class, "setIsActive"]);

// rapports resources
Route::get("$prefix/rapports", [RapportsController::class, "index"]);
Route::get("$prefix/rapports/create", [RapportsController::class, "create"]);
Route::post("$prefix/rapports", [RapportsController::class, "store"]);
Route::get("$prefix/rapports/{id}/edit", [RapportsController::class, "edit"]);
Route::put("$prefix/rapports/{id}", [RapportsController::class, "update"]);
Route::get("$prefix/rapports/{id}", [RapportsController::class, "show"]);
Route::delete("$prefix/rapports/{id}", [RapportsController::class, "destroy"]);

// articles resources
Route::get("$prefix/articles", [ArticlesController::class, "index"]);
Route::get("$prefix/articles/create", [ArticlesController::class, "create"]);
Route::post("$prefix/articles", [ArticlesController::class, "store"]);
Route::get("$prefix/articles/{id}/edit", [ArticlesController::class, "edit"]);
Route::put("$prefix/articles/{id}", [ArticlesController::class, "update"]);
Route::get("$prefix/articles/{id}", [ArticlesController::class, "show"]);
Route::delete("$prefix/articles/{id}", [ArticlesController::class, "destroy"]);

// populations resources
Route::get("$prefix/populations", [PopulationsController::class, "index"]);
Route::get("$prefix/populations/create", [PopulationsController::class, "create"]);
Route::post("$prefix/populations", [PopulationsController::class, "store"]);
Route::get("$prefix/populations/{id}/edit", [PopulationsController::class, "edit"]);
Route::put("$prefix/populations/{id}", [PopulationsController::class, "update"]);
Route::get("$prefix/populations/{id}", [PopulationsController::class, "show"]);
Route::delete("$prefix/populations/{id}", [PopulationsController::class, "destroy"]);
// partners resources
Route::get("$prefix/partners", [PartnersController::class, "index"]);
Route::get("$prefix/partners/create", [PartnersController::class, "create"]);
Route::post("$prefix/partners", [PartnersController::class, "store"]);
Route::get("$prefix/partners/{id}/edit", [PartnersController::class, "edit"]);
Route::put("$prefix/partners/{id}", [PartnersController::class, "update"]);
Route::get("$prefix/partners/{id}", [PartnersController::class, "show"]);
Route::delete("$prefix/partners/{id}", [PartnersController::class, "destroy"]);

// connexions
Route::get("$prefix/connexions", [ConnexionsController::class, "index"]);
Route::delete("$prefix/connexions/{id}", [ConnexionsController::class, "destroy"]);
// operations
Route::get("$prefix/operations", [OperationsController::class, "index"]);
Route::delete("$prefix/operations/{id}", [OperationsController::class, "destroy"]);
// roles
Route::get("$prefix/roles", [RolesController::class, "index"]);

Route::get("$prefix/profile", [ProfileController::class, 'index']);
Route::put("$prefix/profile/change-password", [ProfileController::class, 'changePassword']);