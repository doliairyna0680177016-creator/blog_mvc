<?php

use Carbon\Carbon;

class Post
{
    public string $title;
    public string $content;
    public string $createdAt;

    public function __construct(string $title, string $content, ?string $createdAt = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt ?? Carbon::now()->format('d.m.Y');
    }

    public static function getAll(): array
    {
        return [
            new Post(
                "Мій перший пост",
                "Це **приклад** першого поста з *курсивом* та списком:\n- пункт 1\n- пункт 2",
                "20.11.2026"
            ),
            new Post(
                "MVC у PHP",
                "MVC — це поділ коду на **Model**, **View** та **Controller**.",
                "21.11.2026"
            ),
            new Post(
                "Composer",
                "Composer керує залежностями та автозавантаженням (`vendor/autoload.php`).",
                "22.11.2026"
            ),
            new Post(
                "GitHub",
                "Зберігання коду та комітів: [GitHub](https://github.com).",
                "24.11.2026"
            ),
            new Post(
                "Наступний крок",
                "> Цитата у Markdown і поточна дата через Carbon.",
                Carbon::now()->format('d.m.Y')
            ),
        ];
    }

    public static function search(string $query): array
    {
        $posts = self::getAll();
        $query = trim($query);

        if ($query === '') {
            return $posts;
        }

        return array_values(array_filter(
            $posts,
            static fn(Post $post): bool => mb_stripos($post->title, $query, 0, 'UTF-8') !== false
        ));
    }
}