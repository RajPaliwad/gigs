<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CreateGig;
use App\Http\Livewire\EditGig;
use App\Http\Livewire\Listings;
use App\Http\Livewire\ManageGigs;
use App\Http\Livewire\ShowListing;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    // All Listings
    Route::get('/', Listings::class)->name('listings.index');

    // Show Create Form
    Route::get('/listings/create', CreateGig::class)->middleware('auth');

    // Store Listing Data
    Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

    // Show Edit Form
    Route::get('/listings/{slug}/edit', EditGig::class)->middleware('auth');

    // Update Listing
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

    // Delete Listing
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

    // Manage Listings
    Route::get('/listings/manage', ManageGigs::class)->middleware('auth');

    // Single Listing
    Route::get('/listings/{slug}', ShowListing::class)->name('listings.show');

    // Show Register/Create Form
    Route::get('/register', [UserController::class, 'create'])->middleware('guest');

    // Create New User
    Route::post('/users', [UserController::class, 'store']);

    // Log User Out
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

    // Show Login Form
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
    // Log In User
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
});
