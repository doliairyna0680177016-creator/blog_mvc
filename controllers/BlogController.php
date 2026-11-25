<?php

require_once __DIR__ . '/../models/Post.php';

class BlogController
{
    public function showAllPosts(string $search = ''): void
    {
        $posts = Post::search($search);
        require __DIR__ . '/../views/postsView.php';
    }
}