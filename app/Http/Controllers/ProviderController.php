<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Provider;

use App\Repositories\ProviderRepository;

class ProviderController extends Controller
{
    public function index(ProviderRepository $providerRepository){    

        //$ratecards = $ratecardRepository->getAll();
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }
}
