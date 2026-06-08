<?php

namespace App\Controllers;

use App\Models\UserProfileModel;
use App\Models\UserDocumentModel;

class Profile extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        $profileModel = new UserProfileModel();
        $documentModel = new UserDocumentModel();

        $profile = $profileModel->getByUserId($user['id']);
        $documents = $documentModel->getByUserId($user['id']);

        return view('profile/index', [
            'user' => $user,
            'profile' => $profile,
            'documents' => $documents,
        ]);
    }

    public function upload()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        $file = $this->request->getFile('profile_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
            $profileImage = '/writable/uploads/' . $fileName;

            $userModel = new \App\Models\UserModel();
            $userModel->update($user['id'], ['foto_profil' => $profileImage]);
            $user['foto_profil'] = $profileImage;
            session()->set('user', $user);
        }

        return redirect()->to('/profile')->with('success', 'Foto profil berhasil diunggah.');
    }

    public function updateProfile()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        $profileModel = new UserProfileModel();
        $data = [
            'id_pengguna' => $user['id'],
            'nik' => $this->request->getPost('nik'),
            'telepon' => $this->request->getPost('phone'),
            'alamat' => $this->request->getPost('address'),
            'pekerjaan' => $this->request->getPost('occupation'),
            'penghasilan' => $this->request->getPost('income'),
        ];

        $existing = $profileModel->getByUserId($user['id']);
        if ($existing) {
            $profileModel->update($existing['id'], $data);
        } else {
            $profileModel->insert($data);
        }

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function uploadDocument()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        $file = $this->request->getFile('document');
        $docType = $this->request->getPost('document_type');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
            $filePath = '/writable/uploads/' . $fileName;

            $documentModel = new UserDocumentModel();
            $documentModel->insert([
                'id_pengguna' => $user['id'],
                'jenis_dokumen' => $docType,
                'path_file' => $filePath,
                'status' => 'pending',
            ]);
        }

        return redirect()->to('/profile')->with('success', 'Dokumen berhasil diunggah.');
    }
}
