<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\GlossaryTerm;

class GlossaryAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $glossaryModel = new GlossaryTerm();
        $terms = $glossaryModel->all('letter ASC, term ASC');

        $this->render('admin.glossary.index', [
            'pageTitle' => 'Manage Glossary Terms',
            'terms' => $terms
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.glossary.form', [
            'pageTitle' => 'Add Glossary Term',
            'term' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/glossary');
            return;
        }

        $term = trim((string)$this->request->input('term'));
        $slug = Helper::slugify($term);
        $letter = strtoupper(substr($term, 0, 1));
        $shortDef = trim((string)$this->request->input('short_definition'));
        $detailed = trim((string)$this->request->input('detailed_explanation'));
        $category = trim((string)$this->request->input('category', 'FDM Technology'));
        $related = trim((string)$this->request->input('related_terms'));

        $glossaryModel = new GlossaryTerm();
        $id = $glossaryModel->create([
            'term' => $term,
            'slug' => $slug,
            'letter' => $letter,
            'short_definition' => $shortDef,
            'detailed_explanation' => $detailed,
            'category' => $category,
            'related_terms' => $related
        ]);

        Logger::log('create', 'glossary', $id, "Added glossary term: $term");
        $this->setFlash('success', 'Glossary term added.');
        $this->redirect('admin/glossary');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $glossaryModel = new GlossaryTerm();
        $term = $glossaryModel->find((int)$id);

        if (!$term) {
            $this->setFlash('error', 'Term not found.');
            $this->redirect('admin/glossary');
            return;
        }

        $this->render('admin.glossary.form', [
            'pageTitle' => 'Edit Term: ' . $term['term'],
            'term' => $term
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/glossary');
            return;
        }

        $id = (int)$id;
        $term = trim((string)$this->request->input('term'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($term);
        $letter = strtoupper(substr($term, 0, 1));
        $shortDef = trim((string)$this->request->input('short_definition'));
        $detailed = trim((string)$this->request->input('detailed_explanation'));
        $category = trim((string)$this->request->input('category', 'FDM Technology'));
        $related = trim((string)$this->request->input('related_terms'));

        $glossaryModel = new GlossaryTerm();
        $glossaryModel->update($id, [
            'term' => $term,
            'slug' => $slug,
            'letter' => $letter,
            'short_definition' => $shortDef,
            'detailed_explanation' => $detailed,
            'category' => $category,
            'related_terms' => $related
        ]);

        Logger::log('update', 'glossary', $id, "Updated glossary term: $term");
        $this->setFlash('success', 'Glossary term updated.');
        $this->redirect('admin/glossary');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/glossary');
            return;
        }

        $glossaryModel = new GlossaryTerm();
        $t = $glossaryModel->find((int)$id);
        if ($t) {
            $glossaryModel->delete((int)$id);
            Logger::log('delete', 'glossary', (int)$id, "Deleted term: {$t['term']}");
            $this->setFlash('success', 'Term deleted.');
        }

        $this->redirect('admin/glossary');
    }
}
