<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Logger;
use App\Core\Validator;
use App\Models\Admin;
use App\Models\Role;

class UserAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');

        $adminModel = new Admin();
        $users = $adminModel->getAllWithRole();

        $this->render('admin.users.index', [
            'pageTitle' => 'Administrator User & Role Management',
            'users' => $users
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');

        $roleModel = new Role();
        $roles = $roleModel->all('id ASC');

        $this->render('admin.users.form', [
            'pageTitle' => 'Create Administrator Account',
            'user' => null,
            'roles' => $roles
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');
        if (!$this->validateCsrf()) {
            $this->redirect('admin/users');
            return;
        }

        $validator = new Validator();
        $data = [
            'username' => trim((string)$this->request->input('username')),
            'email' => trim((string)$this->request->input('email')),
            'full_name' => trim((string)$this->request->input('full_name')),
            'designation' => trim((string)$this->request->input('designation')),
            'password' => (string)$this->request->input('password')
        ];

        if (!$validator->validate($data, [
            'username' => 'required|min:3|max:50',
            'email' => 'required|email|max:100',
            'full_name' => 'required|min:2|max:100',
            'password' => 'required|min:6'
        ])) {
            $this->setFlash('error', $validator->firstError() ?? 'Validation failed.');
            $this->redirect('admin/users/create');
            return;
        }

        $adminModel = new Admin();
        if ($adminModel->findBy('username', $data['username'])) {
            $this->setFlash('error', 'Username already in use.');
            $this->redirect('admin/users/create');
            return;
        }

        $id = $adminModel->create([
            'role_id' => (int)$this->request->input('role_id', 2),
            'username' => $data['username'],
            'email' => $data['email'],
            'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
            'full_name' => $data['full_name'],
            'designation' => $data['designation'],
            'is_active' => $this->request->input('is_active') ? 1 : 0
        ]);

        Logger::log('create', 'users', $id, "Created admin user: {$data['username']}");
        $this->setFlash('success', 'User created successfully.');
        $this->redirect('admin/users');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');

        $adminModel = new Admin();
        $user = $adminModel->find((int)$id);

        if (!$user) {
            $this->setFlash('error', 'User not found.');
            $this->redirect('admin/users');
            return;
        }

        $roleModel = new Role();
        $roles = $roleModel->all('id ASC');

        $this->render('admin.users.form', [
            'pageTitle' => 'Edit User: ' . $user['username'],
            'user' => $user,
            'roles' => $roles
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');
        if (!$this->validateCsrf()) {
            $this->redirect('admin/users');
            return;
        }

        $id = (int)$id;
        $adminModel = new Admin();
        $user = $adminModel->find($id);

        if (!$user) {
            $this->setFlash('error', 'User not found.');
            $this->redirect('admin/users');
            return;
        }

        $updateData = [
            'role_id' => (int)$this->request->input('role_id', 2),
            'email' => trim((string)$this->request->input('email')),
            'full_name' => trim((string)$this->request->input('full_name')),
            'designation' => trim((string)$this->request->input('designation')),
            'is_active' => $this->request->input('is_active') ? 1 : 0
        ];

        $newPassword = (string)$this->request->input('password');
        if (!empty($newPassword)) {
            $updateData['password_hash'] = password_hash($newPassword, PASSWORD_BCRYPT);
        }

        $adminModel->update($id, $updateData);

        Logger::log('update', 'users', $id, "Updated admin user: {$user['username']}");
        $this->setFlash('success', 'User updated successfully.');
        $this->redirect('admin/users');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');
        if (!$this->validateCsrf()) {
            $this->redirect('admin/users');
            return;
        }

        $id = (int)$id;
        if ($id === 1) {
            $this->setFlash('error', 'Primary Super Administrator cannot be removed.');
            $this->redirect('admin/users');
            return;
        }

        $adminModel = new Admin();
        $u = $adminModel->find($id);
        if ($u) {
            $adminModel->delete($id);
            Logger::log('delete', 'users', $id, "Deleted admin user: {$u['username']}");
            $this->setFlash('success', 'User deleted.');
        }

        $this->redirect('admin/users');
    }
}
