<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Http\Requests\RegistrationForm;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {

        $form->persist();

        return redirect()->home();
    }
}
