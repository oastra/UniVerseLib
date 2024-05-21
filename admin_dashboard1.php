<?php
session_start();
include 'inc/db_config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = ['success' => false, 'message' => ''];

    if (isset($_POST['add_book'])) {
        $title = trim($_POST['title']);
        $author = trim($_POST['author']);
        $publisher = trim($_POST['publisher']);
        $language = trim($_POST['language']);
        $category = trim($_POST['category']);

        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'webp');
            $uploadFileDir = './images/books/';
            $newFileName = str_replace(' ', '_', $title) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (in_array($fileExtension, $allowedfileExtensions)) {
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $image = $dest_path;

                    $sql = "INSERT INTO books (title, author, publisher, language, category, image) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $title, $author, $publisher, $language, $category, $image);

                    if ($stmt->execute()) {
                        $_SESSION['message'] = 'Book added successfully!';
                        header('Location: admin_dashboard.php');
                        exit;
                    } else {
                        $response['message'] = 'Error adding book.';
                    }
                } else {
                    $response['message'] = 'Error moving the uploaded file.';
                }
            } else {
                $response['message'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
        } else {
            $response['message'] = 'There was some error in the file upload.';
        }
    } elseif (isset($_POST['update_book'])) {
        $book_id = $_POST['book_id'];
        $title = trim($_POST['title']);
        $author = trim($_POST['author']);
        $publisher = trim($_POST['publisher']);
        $language = trim($_POST['language']);
        $category = trim($_POST['category']);

        // Handle image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'webp');
            $uploadFileDir = './images/books/';
            $newFileName = str_replace(' ', '_', $title) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (in_array($fileExtension, $allowedfileExtensions)) {
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $image = $dest_path;
                } else {
                    $response['message'] = 'Error moving the uploaded file.';
                }
            } else {
                $response['message'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
        } else {
            $image = $_POST['existing_image'];
        }

        $sql = "UPDATE books SET title = ?, author = ?, publisher = ?, language = ?, category = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $title, $author, $publisher, $language, $category, $image, $book_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Book updated successfully!';
        } else {
            $response['message'] = 'Error updating book.';
        }

        echo json_encode($response);
        exit;
    } elseif (isset($_POST['delete_book'])) {
        $book_id = $_POST['book_id'];

        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $book_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Book deleted successfully!';
        } else {
            $response['message'] = 'Error deleting book.';
        }

        echo json_encode($response);
        exit;
    }
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="UniVerse Library is the official library of the Australian University, providing students, faculty, and researchers with easy access to a vast collection of books and resources from various publishers and authors.">
    <meta name="keywords" content="UniVerse Library, Australian University, library resources, academic library, university library, research resources, books, ebooks, academic events, student workshops, research collaboration, PhD coworking spaces, career development, internships, volunteering programs">
    <meta name="author" content="Olha Chernysh">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/favicon.png" />
    <title>UniVerse Lib | Admin Dashboard</title>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a href="index.html" class="navbar-brand fs-3">
                <img src="images/library-logo.png" alt="" width="70" />
                UniVerse<i class="fa-solid fa-feather"></i>Lib
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link fw-semibold">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#details" class="nav-link fw-semibold">Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#events" class="nav-link fw-semibold">Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="inc/logout.php" class="nav-link fw-semibold btn btn-outline-light px-4 ms-5"><i class="fa-solid fa-user-minus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header id="header" class="header">
        <div class="hero text-white pt-7">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container mb-5 px-4">
                            <img src="images/header-ebook.png" class="img-fluid" alt="Ebooks">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-container p-4 d-flex flex-column justify-content-center h-100">
                            <h1 class="display-3 fw-bold mb-4"><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></h1>
                            <p class="lead">
                              Welcome to UniVerse Lib, your comprehensive management platform for our vast library resources. As an administrator, you have the tools and capabilities to oversee and enhance our library's offerings. Explore the features and services available to streamline library operations and provide exceptional service to our academic community.
                            </p>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="frame-decoration" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 192.275">
            <defs>
                <style>.cls-1 { fill: #10bcee; }</style>
            </defs>
            <path class="cls-1" d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z" transform="translate(0 -158.755)" />
        </svg>
    </header>
    
    <div class="container my-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBookModal">Add New Book</button>
        <div class="row">
            <div class="col-md-12">
                <h3>Manage Books</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Language</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr data-id="<?php echo htmlspecialchars($row['id']); ?>">
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td class="title"><?php echo htmlspecialchars($row['title']); ?></td>
                            <td class="author"><?php echo htmlspecialchars($row['author']); ?></td>
                            <td class="publisher"><?php echo htmlspecialchars($row['publisher']); ?></td>
                            <td class="language"><?php echo htmlspecialchars($row['language']); ?></td>
                            <td class="category"><?php echo htmlspecialchars($row['category']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" width="50"></td>
                            <td>
                                <button class="btn btn-outline-warning btn-sm update-book">Update</button>
                                <button class="btn btn-danger btn-sm delete-book" data-id="<?php echo htmlspecialchars($row['id']); ?>">Delete</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="publisher" required>
                        </div>
                        <div class="mb-3">
                            <label for="language" class="form-label">Language</label>
                            <input type="text" class="form-control" id="language" name="language" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Book Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle book update
        document.querySelectorAll('.update-book').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const editable = row.getAttribute('data-editable') === 'true';
                
                // Toggle row editable state
                row.setAttribute('data-editable', !editable);

                // Change button style and text
                if (!editable) {
                    row.querySelectorAll('td.title, td.author, td.publisher, td.language, td.category').forEach(cell => cell.contentEditable = true);
                    this.classList.remove('btn-outline-warning');
                    this.classList.add('btn-warning');
                    this.textContent = 'Save';
                } else {
                    const bookId = row.dataset.id;
                    const formData = new FormData();

                    formData.append('book_id', bookId);
                    formData.append('title', row.querySelector('.title').textContent);
                    formData.append('author', row.querySelector('.author').textContent);
                    formData.append('publisher', row.querySelector('.publisher').textContent);
                    formData.append('language', row.querySelector('.language').textContent);
                    formData.append('category', row.querySelector('.category').textContent);
                    formData.append('existing_image', row.querySelector('img').src);
                    formData.append('update_book', true);

                    fetch('admin_dashboard.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Book updated successfully!');
                            row.querySelectorAll('td.title, td.author, td.publisher, td.language, td.category').forEach(cell => cell.contentEditable = false);
                            row.setAttribute('data-editable', false);
                            this.classList.remove('btn-warning');
                            this.classList.add('btn-outline-warning');
                            this.textContent = 'Update';
                        } else {
                            console.error('Error updating book:', data.message);
                        }
                    })
                    .catch(error => console.error('Fetch error:', error));
                }
            });
        });

        // Handle book deletion
        document.querySelectorAll('.delete-book').forEach(button => {
            button.addEventListener('click', function() {
                if (!confirm('Are you sure you want to delete this book?')) {
                    return;
                }

                const bookId = this.dataset.id;
                const formData = new FormData();
                formData.append('book_id', bookId);
                formData.append('delete_book', true);

                fetch('admin_dashboard.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Book deleted successfully!');
                        location.reload();
                    } else {
                        console.error('Error deleting book:', data.message);
                    }
                })
                .catch(error => console.error('Fetch error:', error));
            });
        });
    });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
