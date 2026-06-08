<?php

namespace App\Controllers;

use App\Models\UserProfileModel;
use App\Models\UserDocumentModel;

class Profile extends BaseCONtroller
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
        $documents = $doucumentModel->getByUserId($user['id']);

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
            $filename = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $filename);
            $profileImage = '/writable/uploads/' . $fileName;

            $useModel = new \App\Models\UserModel();
            $userModel->update($user['id'], ['foto_profil' => $profileImage]);
            $user['foto_profil'] = $profileImage;
            session()->set('user', $user);
        }
        
        return redirect()->to('/profile')->with('succes', 'foto profil berhasil diunggah.');
    }
}