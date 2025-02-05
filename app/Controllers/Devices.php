<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Device;
use CodeIgniter\HTTP\ResponseInterface;

class Devices extends BaseController
{
    public function index()
    {
        $model = new Device();
        $data = [
            'title' => 'Home',
            'devices' => $model->findAll(),
        ];
        return view('devices/view', $data);
    }

    public function panelPage()
    {
        $model = new Device();
        $data = [
            'title' => 'Home',
            'devices' => $model->findAll(),
        ];
        return view('devices/panel', $data);
    }

    public function createPage()
    {
        return view('devices/create', ['title' => 'Create']);
    }

    public function create()
    {
        helper('form');
        if (
            $this->validate([
                'device_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Device Name cannot be empty'
                    ],
                ],
                'latitude' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Latitude cannot be empty',
                        'numeric' => 'Latitude must be numeric'
                    ],
                ],
                'longitude' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Longitude cannot be empty',
                        'numeric' => 'Longitude must be numeric'
                    ],
                ],
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Longitude cannot be empty',
                    ],
                ],
            ])
        ) {
            $model = new Device();
            $model->save([
                'device_name' => $this->request->getPost('device_name'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'location' => $this->request->getPost('location'),
            ]);

            return redirect()->to('/panel')->with('message', 'Data successfully saved');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function get_devices()
    {
        $model = new Device();
        return $this->response->setJSON($model->findAll());
    }
}
