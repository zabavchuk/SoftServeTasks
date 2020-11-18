<?php

namespace App\Models;

use PDO;
use App\Database;

/**
 * Class Book
 * @package App\Models
 */
class Book
{

    /**
     * @return array
     */
    public static function getAllBooks()
    {
        $query = 'SELECT * FROM books';
        $result = Database::getInstance()->pdo->prepare($query);
        $result->execute(array(':books' => 'query'));

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $author
     * @param string $title
     * @param string $description
     * @param string $language
     * @param int $pages
     * @param string $image
     */
    public static function insertBook(string $author, string $title, string $description, string $language, int $pages, string $image)
    {

        $insert_data = array(
            'author' => $author,
            'title' => $title,
            'description' => $description,
            'lang' => $language,
            'pages' => $pages,
            'image' => $image,
        );

        $query = "INSERT INTO books (author, title, description, lang, pages, image)
                              VALUES (:author, :title, :description, :lang, :pages, :image)";


        $result = Database::getInstance()->pdo->prepare($query);
        $result->execute($insert_data);
    }
}