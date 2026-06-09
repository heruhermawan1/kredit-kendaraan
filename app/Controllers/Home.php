<?php

namespace App\Controllers;

use App\Models\VehicleModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper(['form', 'url']);

        $vehicleModel = new VehicleModel();
        $vehicles = $vehicleModel->orderBy('dibuat_pada', 'DESC')->findAll(4);

        return view('home', [
            'vehicles' => $vehicles,
            'user' => session()->get('user'),
        ]);
    }
}
