<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php';

$books = [
    [
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "publisher" => "Scribner",
        "language" => "English",
        "category" => "Fiction",
        "image" => "images/books/The_Great_Gatsby.webp"
    ],
    [
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "publisher" => "J.B. Lippincott & Co.",
        "language" => "English",
        "category" => "Fiction",
        "image" => "images/books/To_Kill_a_Mockingbird.webp"
    ],
    [
        "title" => "1984",
        "author" => "George Orwell",
        "publisher" => "Secker & Warburg",
        "language" => "English",
        "category" => "Fiction",
        "image" => "images/books/1984.webp"
    ],
    [
        "title" => "Les Misérables",
        "author" => "Victor Hugo",
        "publisher" => "A. Lacroix, Verboeckhoven & Cie.",
        "language" => "French",
        "category" => "Fiction",
        "image" => "images/books/Les_Miserables.webp"
    ],
    [
        "title" => "The Art of War",
        "author" => "Sun Tzu",
        "publisher" => "Shambhala Publications",
        "language" => "Mandarin",
        "category" => "Reference",
        "image" => "images/books/The_Art_of_War.webp"
    ],
    [
        "title" => "Evenings on a Farm Near Dikanka",
        "author" => "Mykola Gogol",
        "publisher" => "Folio",
        "language" => "Ukrainian",
        "category" => "Fiction",
        "image" => "images/books/Evenings_on_a_Farm_Near_Dikanka.webp"
    ],
    [
        "title" => "Shadows of Forgotten Ancestors",
        "author" => "Mykhailo Kotsiubynsky",
        "publisher" => "Vydavnytstvo Kharkiv",
        "language" => "Ukrainian",
        "category" => "Fiction",
        "image" => "images/books/Shadows_of_Forgotten_Ancestors.webp"
    ],
    [
        "title" => "The Catcher in the Rye",
        "author" => "J.D. Salinger",
        "publisher" => "Little, Brown and Company",
        "language" => "English",
        "category" => "Fiction",
        "image" => "images/books/The_Catcher_in_the_Rye.webp"
    ],
    [
        "title" => "The Divine Comedy",
        "author" => "Dante Alighieri",
        "publisher" => "John Murray",
        "language" => "Italian",
        "category" => "Fiction",
        "image" => "images/books/The_Divine_Comedy.webp"
    ],
    [
        "title" => "Principles of Economics",
        "author" => "N. Gregory Mankiw",
        "publisher" => "Cengage Learning",
        "language" => "English",
        "category" => "Nonfiction",
        "image" => "images/books/Principles_of_Economics.webp"
    ]
];

foreach ($books as $book) {
    $sql = "INSERT INTO books (title, author, publisher, language, category, image) 
            VALUES ('{$book['title']}', '{$book['author']}', '{$book['publisher']}', '{$book['language']}', '{$book['category']}', '{$book['image']}')";
    if ($conn->query($sql) === TRUE) {
        echo "Book '{$book['title']}' added successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
