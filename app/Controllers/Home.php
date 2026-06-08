<?php

namespace App\Controllers;

use App\Models\VehicleModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper(['form', 'url']);

        $vehicleModel = new VehicleModel();
        $Vehicles = $vehicleModel->orderBy('dibuat_pada', 'DESC')->findA11(4);

        return view('home',[
            'vechiles' => $vehicles,
            'user' => session()->get('user'),
        ]);
    }
}