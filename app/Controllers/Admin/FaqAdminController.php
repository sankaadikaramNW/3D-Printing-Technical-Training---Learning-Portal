<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Logger;
use App\Models\Faq;

class FaqAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $faqModel = new Faq();
        $faqs = $faqModel->all('category ASC, sort_order ASC');

        $this->render('admin.faqs.index', [
            'pageTitle' => 'Manage FAQs',
            'faqs' => $faqs
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.faqs.form', [
            'pageTitle' => 'Add FAQ',
            'faq' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/faqs');
            return;
        }

        $category = trim((string)$this->request->input('category', 'General'));
        $question = trim((string)$this->request->input('question'));
        $answer = trim((string)$this->request->input('answer'));

        $faqModel = new Faq();
        $id = $faqModel->create([
            'category' => $category,
            'question' => $question,
            'answer' => $answer,
            'sort_order' => (int)$this->request->input('sort_order', 0),
            'is_published' => 1
        ]);

        Logger::log('create', 'faqs', $id, "Added FAQ: $question");
        $this->setFlash('success', 'FAQ added successfully.');
        $this->redirect('admin/faqs');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $faqModel = new Faq();
        $faq = $faqModel->find((int)$id);

        if (!$faq) {
            $this->setFlash('error', 'FAQ not found.');
            $this->redirect('admin/faqs');
            return;
        }

        $this->render('admin.faqs.form', [
            'pageTitle' => 'Edit FAQ',
            'faq' => $faq
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/faqs');
            return;
        }

        $id = (int)$id;
        $category = trim((string)$this->request->input('category', 'General'));
        $question = trim((string)$this->request->input('question'));
        $answer = trim((string)$this->request->input('answer'));

        $faqModel = new Faq();
        $faqModel->update($id, [
            'category' => $category,
            'question' => $question,
            'answer' => $answer,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('update', 'faqs', $id, "Updated FAQ: $question");
        $this->setFlash('success', 'FAQ updated.');
        $this->redirect('admin/faqs');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/faqs');
            return;
        }

        $faqModel = new Faq();
        $f = $faqModel->find((int)$id);
        if ($f) {
            $faqModel->delete((int)$id);
            Logger::log('delete', 'faqs', (int)$id, "Deleted FAQ");
            $this->setFlash('success', 'FAQ deleted.');
        }

        $this->redirect('admin/faqs');
    }
}
