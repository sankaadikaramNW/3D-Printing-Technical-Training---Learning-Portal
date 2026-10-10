<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Session;

class AuthController extends Controller
{
    public function login(): void
    {
        if (Auth::check()) {
            $this->redirect('admin');
            return;
        }

        $this->render('admin.login', [
            'pageTitle' => 'Admin Authentication - FDM 3D Printer Portal',
            'metaDescription' => 'Secure administrator login for portal management.'
        ], 'auth');
    }

    public function postLogin(): void
    {
        if (!$this->validateCsrf()) {
            $this->redirect('admin/login');
            return;
        }

        $username = trim((string)$this->request->input('username'));
        $password = (string)$this->request->input('password');

        if (empty($username) || empty($password)) {
            $this->setFlash('error', 'Please enter both username and password.');
            $this->redirect('admin/login');
            return;
        }

        if (Auth::attempt($username, $password)) {
            $this->setFlash('success', 'Welcome back to the Technical Portal Admin Panel.');
            $this->redirect('admin');
        } else {
            $this->setFlash('error', 'Invalid username or password. Please verify your credentials.');
            $this->redirect('admin/login');
        }
    }

    public function logout(): void
    {
        Auth::logout();
        $this->setFlash('info', 'You have been safely logged out.');
        $this->redirect('admin/login');
    }
}
