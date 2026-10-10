<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validator;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->render('pages.contact', [
            'pageTitle' => 'Contact Technical Training Division & Inquiries',
            'metaDescription' => 'Get in touch with the FDM 3D printer project development team, request workshop sessions, or submit technical training questions.'
        ]);
    }

    public function submit(): void
    {
        if (!$this->validateCsrf()) {
            $this->redirect('contact');
            return;
        }

        $validator = new Validator();
        $data = [
            'full_name' => trim((string)$this->request->input('full_name')),
            'email' => trim((string)$this->request->input('email')),
            'organization' => trim((string)$this->request->input('organization')),
            'subject' => trim((string)$this->request->input('subject')),
            'message' => trim((string)$this->request->input('message'))
        ];

        $isValid = $validator->validate($data, [
            'full_name' => 'required|min:2|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|min:3|max:200',
            'message' => 'required|min:10'
        ]);

        if (!$isValid) {
            $this->setFlash('error', $validator->firstError() ?? 'Please fill out all required fields correctly.');
            $this->redirect('contact');
            return;
        }

        $msgModel = new ContactMessage();
        $msgModel->create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'organization' => $data['organization'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'is_read' => 0
        ]);

        $this->setFlash('success', 'Your inquiry has been received. Our technical training team will review and respond promptly.');
        $this->redirect('contact');
    }
}
