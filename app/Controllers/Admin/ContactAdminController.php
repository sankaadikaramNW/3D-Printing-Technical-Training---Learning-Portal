<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Logger;
use App\Models\ContactMessage;

class ContactAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $msgModel = new ContactMessage();
        $messages = $msgModel->all('id DESC');

        $this->render('admin.contacts.index', [
            'pageTitle' => 'Contact Inquiries & Trainee Feedback',
            'messages' => $messages
        ], 'admin');
    }

    public function view(string $id): void
    {
        $this->requireAuth();
        $msgModel = new ContactMessage();
        $id = (int)$id;
        $message = $msgModel->find($id);

        if (!$message) {
            $this->setFlash('error', 'Message not found.');
            $this->redirect('admin/contacts');
            return;
        }

        // Mark as read
        if ($message['is_read'] == 0) {
            $msgModel->update($id, ['is_read' => 1]);
        }

        $this->render('admin.contacts.view', [
            'pageTitle' => 'View Inquiry: ' . $message['subject'],
            'message' => $message
        ], 'admin');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/contacts');
            return;
        }

        $msgModel = new ContactMessage();
        $m = $msgModel->find((int)$id);
        if ($m) {
            $msgModel->delete((int)$id);
            Logger::log('delete', 'contact_messages', (int)$id, "Deleted message from: {$m['email']}");
            $this->setFlash('success', 'Message deleted.');
        }

        $this->redirect('admin/contacts');
    }
}
