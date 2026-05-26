<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Portofolio, Profile, Contact, Skill};

Route::get('/', function () {
    return view('welcome', [
        'portofolios' => Portofolio::latest()->get(),
        'profile'     => Profile::first() ?? new Profile(),
        'contact'     => Contact::first() ?? new Contact(),
        'skills'      => Skill::all(), // Data skill sekarang tersedia di view welcome
    ]);
});
