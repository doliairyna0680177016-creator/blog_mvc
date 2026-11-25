<?php

require_once __DIR__ . '/../models/Post.php';

class BlogController
{
    public function showAllPosts(): void
    {
        $posts = Post::getAll();
        require __DIR__ . '/../views/postsView.php';
    }
}