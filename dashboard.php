<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
include 'inc/db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="UniVerse Library is the official library of the Australian University, providing students, faculty, and researchers with easy access to a vast collection of books and resources from various publishers and authors.">
    <meta name="keywords" content="UniVerse Library, Australian University, library resources, academic library, university library, research resources, books, ebooks, academic events, student workshops, research collaboration, PhD coworking spaces, career development, internships, volunteering programs">
    <meta name="Olha Chernysh" content="UniVerse Library">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/favicon.png" />
    <title>UniVerse Lib | User Dashboard</title>
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
              <a href="inc/logout.php" class="nav-link fw-semibold btn btn-outline-light px-4"><i class="fa-solid fa-user-minus"></i></a>
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
                <img src="images/header-ebook.png" class=" img-fluid" alt="Ebooks">
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-container p-4 d-flex flex-column justify-content-center h-100">
                <h1 class="display-3 fw-bold mb-4"> <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?> </h1>
                <p class="lead">
                   Welcome to UniVerse Lib, your gateway to a world of knowledge and discovery. We are delighted to have you as a part of our academic community. Here are some exciting features and services that await you
                </p>

                  <div class="form-container text-center">
                   <form>
                <div class="my-3">
                    <input type="text" class="form-control form-control-md rounded-5" placeholder="Your Name"/>
                </div>
                <div class="my-3">
                    <input type="email" class="form-control form-control-md rounded-5" placeholder="Email Address"/>
                </div>
                <div class="my-3">
                    <select class="form-control form-control-md rounded-5">
                        <option value="" disabled selected>Select Event</option>
                        <option value="event1">Book Reading</option>
                        <option value="event2">Workshop</option>
                        <option value="event3">Author Meet & Greet</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button class="btn btn-lg btn-primary text-white">
                        Register for Event
                    </button>
                </div>
            </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <svg class="frame-decoration" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 192.275">
        <defs>
          <style>.cls-1 { fill: #10bcee;; }</style>
        </defs>
        <path class="cls-1" d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z" transform="translate(0 -158.755)" />
      </svg>
    </header>


    <!-- Available Books -->

<section class="availBooks">
    <div class="container my-5">
        <h2 class="text-center mb-6"> Explore Our Extensive Collection of Available Books</h2>
        <div class="row justify-content-center">
            <?php
            $sql = "SELECT * FROM books WHERE id NOT IN (SELECT book_id FROM bookstatus WHERE status='Onloan')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mb-5 mx-3 no-padding shadow-lg border-0" style="max-width: 540px;">';
                    echo '  <div class="row g-0">';
                    echo '    <div class="col-md-6">';
                    echo '      <img src="' . $row["image"] . '" class="img-fluid rounded-start h-100 w-100" alt="' . $row["title"] . '">';
                    echo '    </div>';
                    echo '    <div class="col-md-6 d-flex flex-column justify-content-between">';
                    echo '      <div class="card-body no-padding ms-2 d-flex flex-column justify-content-between">';
                    echo '        <h5 class="card-title fw-bold">' . $row["title"] . '</h5>';
                    echo '        <p class="card-text">Author: ' . $row["author"] . '</p>';
                    echo '        <p class="card-text">Publisher: ' . $row["publisher"] . '</p>';
                    echo '        <p class="card-text">Language: ' . $row["language"] . '</p>';
                    echo '        <p class="card-text">Category: ' . $row["category"] . '</p>';
                    echo '        <a href="borrow_book.php?id=' . $row["id"] . '" class="btn btn-outline-primary btn-sm mx-3">Borrow</a>';
                    echo '      </div>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No books available.</p>';
            }
            ?>
        </div>
    </div>
</section>

<section class="borrowed">
   <div class="container my-5">
    <h2 class="text-center mb-4">Borrowed Books</h2>
    <div class="row justify-content-center">
        <?php
        $member_id = $_SESSION['memberID'];
        $sql = "SELECT books.*, bookstatus.borrowed_date, bookstatus.return_due_date 
                FROM books 
                JOIN bookstatus ON books.id = bookstatus.book_id 
                WHERE bookstatus.member_id = $member_id AND bookstatus.status = 'Onloan'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card mb-5 mx-3 no-padding shadow-lg border-0" style="max-width: 540px;">';
                echo '  <div class="row g-0">';
                echo '    <div class="col-md-6">';
                echo '      <img src="' . $row["image"] . '" class="img-fluid rounded-start h-100 w-100" alt="' . $row["title"] . '">';
                echo '    </div>';
                echo '    <div class="col-md-6 d-flex flex-column justify-content-between">';
                echo '      <div class="card-body no-padding ms-2 d-flex flex-column justify-content-between">';
                echo '        <h5 class="card-title fw-bold">' . $row["title"] . '</h5>';
                echo '        <p class="card-text">Author: ' . $row["author"] . '</p>';
                echo '        <p class="card-text">Publisher: ' . $row["publisher"] . '</p>';
                echo '        <p class="card-text">Language: ' . $row["language"] . '</p>';
                echo '        <p class="card-text">Category: ' . $row["category"] . '</p>';
                echo '        <p class="card-text">Borrowed Date: ' . $row["borrowed_date"] . '</p>';
                echo '        <p class="card-text">Return Due Date: ' . $row["return_due_date"] . '</p>';
                echo '        <a href="return_book.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm mx-3">Return</a>';
                echo '      </div>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">No books borrowed.</p>';
        }
        ?>
    </div>
</div>
</section>

        <!-- Statment -->

<section class="statement mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-container bg-light p-5 rounded-5">
          <h3>Library Borrowing and Returning Rules</h3>
          <p>
          <i class="fa-solid text-warning fa-2x fa-file-circle-exclamation"></i>  To ensure a smooth and enjoyable experience for all members, please follow these guidelines when borrowing and returning books:
          </p>
          <ul>
            <li><strong>Borrowing Books:</strong> To borrow a book, simply click on the "Borrow" button next to the book of your choice. Each book can be borrowed for a period of 21 days.</li>
            <li><strong>Returning Books:</strong> To return a book, click on the "Return" button next to the book in your borrowed books list. Make sure to return the book by the due date to avoid any penalties.</li>
            <li><strong>Book Condition:</strong> Please handle all books with care. Return them in the same condition as when borrowed to ensure that other members can also enjoy them.</li>
            <li><strong>Renewals:</strong> If you need more time to finish reading a book, you can renew it for an additional 21 days, provided no other member has reserved it.</li>
            <li><strong>Penalties:</strong> Late returns will incur a fine of $1 per day. Please be mindful of due dates to avoid any charges.</li>
          </ul>
          <p>
            Thank you for being a part of our academic community. Your cooperation helps us maintain a vast and diverse collection for everyone to enjoy. Happy reading!
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php include 'inc/footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
