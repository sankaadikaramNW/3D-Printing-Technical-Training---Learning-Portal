<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function index(): void
    {
        $articleModel = new Article();
        $catModel = new ArticleCategory();

        $selectedCategorySlug = $this->request->input('category');
        $categories = $catModel->all('sort_order ASC, name ASC');

        if ($selectedCategorySlug) {
            $cat = $catModel->findBy('slug', $selectedCategorySlug);
            if ($cat) {
                $articles = $articleModel->where(['category_id' => $cat['id'], 'is_published' => 1], 'created_at DESC');
                $categoryTitle = $cat['name'];
            } else {
                $articles = $articleModel->getPublishedWithCategory();
                $categoryTitle = 'All Technical Articles';
            }
        } else {
            $articles = $articleModel->getPublishedWithCategory();
            $categoryTitle = 'All Technical Articles';
        }

        $this->render('pages.learning_index', [
            'pageTitle' => 'Learning Center & Technical Articles',
            'metaDescription' => 'Explore comprehensive educational articles, technical guides, and tutorials covering all aspects of FDM 3D printing and engineering design.',
            'articles' => $articles,
            'categories' => $categories,
            'selectedCategory' => $selectedCategorySlug,
            'categoryTitle' => $categoryTitle
        ]);
    }

    public function show(string $slug): void
    {
        $articleModel = new Article();
        $article = $articleModel->findBySlug($slug);

        if (!$article) {
            http_response_code(404);
            $this->render('pages.404', [
                'pageTitle' => 'Article Not Found',
                'metaDescription' => 'The requested article could not be located.'
            ]);
            return;
        }

        // Increment view count
        $articleModel->incrementViews((int)$article['id']);

        // Fetch related articles
        $related = $articleModel->where([
            'category_id' => $article['category_id'],
            'is_published' => 1
        ], 'id DESC', 3);
        $related = array_filter($related, fn($item) => $item['id'] != $article['id']);

        $this->render('pages.article_detail', [
            'pageTitle' => $article['title'] . ' - Learning Center',
            'metaDescription' => $article['summary'],
            'article' => $article,
            'relatedArticles' => $related
        ]);
    }
}
