<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('v1/users', [UserController::class, 'index']);
