<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Auth;
use App\Core\Logger;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $articleModel = new Article();
        $articles = $articleModel->getPublishedWithCategory();

        $this->render('admin.articles.index', [
            'pageTitle' => 'Manage Technical Articles',
            'articles' => $articles
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $catModel = new ArticleCategory();
        $categories = $catModel->all('sort_order ASC, name ASC');

        $this->render('admin.articles.form', [
            'pageTitle' => 'Create New Technical Article',
            'categories' => $categories,
            'article' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/articles');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $summary = trim((string)$this->request->input('summary'));
        $content = trim((string)$this->request->input('content'));
        $categoryId = (int)$this->request->input('category_id');
        $readingTime = (int)($this->request->input('reading_time_mins') ?: 5);
        $difficulty = $this->request->input('difficulty_level', 'Beginner');
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;
        $isPublished = $this->request->input('is_published') ? 1 : 0;
        $featuredImage = trim((string)$this->request->input('featured_image', 'assets/images/articles/fundamentals-hero.jpg'));

        $articleModel = new Article();
        $id = $articleModel->create([
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'summary' => $summary,
            'content' => $content,
            'featured_image' => $featuredImage,
            'reading_time_mins' => $readingTime,
            'difficulty_level' => $difficulty,
            'is_featured' => $isFeatured,
            'is_published' => $isPublished,
            'created_by' => Auth::id()
        ]);

        Logger::log('create', 'articles', $id, "Created article: $title");
        $this->setFlash('success', 'Article created successfully.');
        $this->redirect('admin/articles');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $articleModel = new Article();
        $catModel = new ArticleCategory();

        $article = $articleModel->find((int)$id);
        if (!$article) {
            $this->setFlash('error', 'Article not found.');
            $this->redirect('admin/articles');
            return;
        }

        $categories = $catModel->all('sort_order ASC, name ASC');

        $this->render('admin.articles.form', [
            'pageTitle' => 'Edit Technical Article',
            'categories' => $categories,
            'article' => $article
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/articles');
            return;
        }

        $articleModel = new Article();
        $id = (int)$id;

        $title = trim((string)$this->request->input('title'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $summary = trim((string)$this->request->input('summary'));
        $content = trim((string)$this->request->input('content'));
        $categoryId = (int)$this->request->input('category_id');
        $readingTime = (int)($this->request->input('reading_time_mins') ?: 5);
        $difficulty = $this->request->input('difficulty_level', 'Beginner');
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;
        $isPublished = $this->request->input('is_published') ? 1 : 0;
        $featuredImage = trim((string)$this->request->input('featured_image'));

        $articleModel->update($id, [
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'summary' => $summary,
            'content' => $content,
            'featured_image' => $featuredImage,
            'reading_time_mins' => $readingTime,
            'difficulty_level' => $difficulty,
            'is_featured' => $isFeatured,
            'is_published' => $isPublished
        ]);

        Logger::log('update', 'articles', $id, "Updated article: $title");
        $this->setFlash('success', 'Article updated successfully.');
        $this->redirect('admin/articles');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/articles');
            return;
        }

        $articleModel = new Article();
        $article = $articleModel->find((int)$id);
        if ($article) {
            $articleModel->delete((int)$id);
            Logger::log('delete', 'articles', (int)$id, "Deleted article: {$article['title']}");
            $this->setFlash('success', 'Article deleted successfully.');
        } else {
            $this->setFlash('error', 'Article not found.');
        }

        $this->redirect('admin/articles');
    }
}
