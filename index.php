<?php session_start(); ?>
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
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/favicon.png" />
    <title>UniVerse Lib | Australian University Library</title>
  </head>
  <body>
    <!-- NAvigaation -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
      <div class="container">
        <a href="index.php" class="navbar-brand fs-3">
          <img src="images/library-logo.png" alt="" width="70" />
          UniVerse<i class="fa-solid fa-feather"></i>Lib
        </a><span> </span>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link fw-semibold">Home</a>
            </li>
            <li class="nav-item">
              <a href="#details" class="nav-link fw-semibold">Details</a>
            </li>
            <li class="nav-item">
              <a
                href="#events"
                class="nav-link fw-semibold"
                >Events</a
              >
            </li> 
         
        <li class="nav-item ms-5">
          <a href="#" class="nav-link fw-semibold" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa-regular fa-user fa-2x"></i></a>
        </li>
          <li class="nav-item ms-2">
          <a href="#" class="nav-link fw-semibold btn btn-outline-light px-4" data-bs-toggle="modal" data-bs-target="#signupModal"><i class="fa-regular fa-user-plus"></i></a>
        </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- Sign-Up Modal -->

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="signupErrors" style="display: none;" class="alert alert-danger"></div>
            <form id="signupForm">
              <div class="mb-3">
                <label for="signupFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control form-control-md rounded-5 p-2" id="signupFirstName" name="first_name" required>
                <span class="text-danger" id="firstNameError"></span>
              </div>
              <div class="mb-3">
                <label for="signupLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control form-control-md rounded-5 p-2" id="signupLastName" name="last_name" required>
                <span class="text-danger" id="lastNameError"></span>
              </div>
              <div class="mb-3">
                <label for="signupEmail" class="form-label">Email Address (Username)</label>
                <input type="email" class="form-control form-control-md rounded-5 p-2" id="signupEmail" name="email" required>
                <span class="text-danger" id="emailError"></span>
              </div>
              <div class="mb-3">
                <label for="signupPassword" class="form-label">Password</label>
                <input type="password" class="form-control form-control-md rounded-5 p-2" id="signupPassword" name="password" required>
                <span class="text-danger" id="passwordError"></span>
              </div>
              <div class="mb-3">
                <label for="signupRetypePassword" class="form-label">Re-type Password</label>
                <input type="password" class="form-control form-control-md rounded-5 p-2" id="signupRetypePassword" name="retype_password" required>
                <span class="text-danger" id="retypePasswordError"></span>
              </div>
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>







<!-- Login Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="login.php" method="post" class="p-1">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Email Address</label>
            <input type="email" class="form-control form-control-md rounded-5 p-2" id="loginEmail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control form-control-md rounded-5 p-2" id="loginPassword" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>




    <!-- Header -->
    <header id="header" class="header">
      <div class="hero text-white pt-7">
        <div class="container-xl">
          <div class="row">
            <div class="col-md-6">
              <div class="image-container mb-5 px-4">
                <img src="images/header-ebook.png" class=" img-fluid"> </img>
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-container p-4 d-flex flex-column justify content-center h-100 md-5">
                <h1 class="display-3 fw-bold">Welcome to UniVerse Lib</h1>
                <p class="lead">
                    The official library of the Australian University, providing students, faculty, and researchers with easy access to a vast collection of books and resources from various publishers and authors. Experience seamless integration of physical and digital resources, supporting your academic and research needs.
        </p>
        </p>

                <!-- Form -->

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
      <svg
        class="frame-decoration"
        data-name="Layer 2"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none"
        viewBox="0 0 1920 192.275"
      >
        <defs>
          <style>
            .cls-1 {
              fill: #f3f6f9;
            }
          </style>
        </defs>
        <title>frame-decoration</title>
        <path
          class="cls-1"
          d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z"
          transform="translate(0 -158.755)"
        />
      </svg>
    </header>
<!-- Icons -->
<section class="icons bg-light pb-5">
  <div class="container-xl">
    <div class="row hstack g-4">
      <div class="col-md-4 d-flex gap-4">
        <i class="fas fa-book fa-3x text-primary"></i>
        <div>
          <h5 class="fw-bold">Explore Our Collection</h5>
          <p class="text-muted">Discover a wide range of books and resources available at your fingertips. Our extensive collection supports all your learning and reading needs.</p>
        </div>
      </div>
      <div class="col-md-4 d-flex gap-4">
        <i class="fas fa-calendar-alt fa-3x text-secondary"></i>
        <div>
          <h5 class="fw-bold">Stay Updated with Events</h5>
          <p class="text-muted">Join our community events, workshops, and book readings. Stay engaged with our exciting calendar of events designed for all ages and interests.</p>
        </div>
      </div>
      <div class="col-md-4 d-flex gap-4">
        <i class="fas fa-user-friends fa-3x text-primary"></i>
        <div>
          <h5 class="fw-bold">Join Our Community</h5>
          <p class="text-muted">Connect with other readers and learners. Our platform fosters a community of knowledge-sharing and support for all your educational goals.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Details 1 -->
<section id="details" class="details my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="text-container d-flex flex-column justify-content h-100">
         <h2 class="display-6">Engage in Our Academic Events</h2>
    <p>
      Join us for a variety of academic events tailored for university students, faculty, and researchers. Whether you're looking to spark creativity, learn new skills, or connect with others in your field, our events offer something for everyone.
    </p>
    <ul class="list-group-flush lh-lg">
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Student Workshops:</strong>
        Participate in workshops and seminars designed to enhance your academic skills and knowledge.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Research Collaboration:</strong>
        Engage in collaborative research events and discussions with fellow researchers and faculty members.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>PhD Coworking Spaces:</strong>
        Utilize our dedicated coworking spaces for PhD students, providing a productive environment for research and collaboration.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>English Club Meetings:</strong>
        Join our English Club meetings specifically designed for international students to improve their English language skills through engaging and interactive sessions.
      </li>
    </ul>
          <a  class="btn btn-primary text-white mt-4 align-self-start" data-bs-toggle="modal" data-bs-target="#modal1">Choose Your Event</a>
        </div>

      </div>
      <div class="col-lg-6">
        <div class="image-container p-5">
          <img src="images/description.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal1 -->
<div class="modal fade" id="modal1">
  <div class="modal-dialog modal-lg mt-7">
    <div class="modal-content p-5">
      <div class="row">
        <div class="col-lg-6">
          <div class="image-container"><img src="images/description.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="text-container">
<h2 class="display-6">Academic and Community Events:</h2>
<p>
  Participate in a variety of enriching events, workshops, and book readings at UniVerse Library. Please register to attend these events to ensure your spot.
</p>
<ul class="list-group-flush lh-lg">
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Research Skills Workshop:</strong> June 10, 2024 - 2:00 PM at the Main Library
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Academic Writing Workshop:</strong> June 15, 2024 - 4:00 PM at the West Campus Branch
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Author Meet & Greet:</strong> June 20, 2024 - 1:00 PM at the East Campus Branch
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>PhD Research Collaboration:</strong> June 25, 2024 - 3:00 PM at the North Campus Branch
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Graduate Career Fair:</strong> June 30, 2024 - 11:00 AM at the South Campus Branch
  </li>
</ul>
<a href="#" id="registerBtn" class="btn btn-primary text-white">Register for Event</a>



          <button class="btn btn-light" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Statement -->

<section class="statement mb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-container bg-light p-5 rounded-5">
       <h2>Embrace the Joy of Reading</h2>
          <p>
            Discover the timeless tradition of reading with our extensive collection of books and magazines. There's something uniquely satisfying about holding a book, feeling the texture of the pages, and immersing yourself in the distinct aroma of printed paper. These sensory experiences not only enhance your reading pleasure but also stimulate your imagination and creativity. Whether for leisure or academic purposes, reading books can transport you to different worlds, expand your knowledge, and inspire new ideas. Join us in preserving this cherished tradition and let your imagination soar with every turn of the page.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Deatils 2 -->

<section id="events" class="details my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="image-container p-5">
          <img src="images/author.png" alt="" class="img-fluid">
        </div>
      </div>
<div class="col-lg-6">
  <div class="text-container d-flex flex-column justify-content h-100">
   <h2 class="display-6">Engage in Our Exciting Events</h2>
    <p>
      Join us for a variety of events tailored for university students, faculty, and professionals. Whether you're looking to contribute to the community, enhance your career, or connect with industry leaders, our events offer something for everyone.
    </p>
    <ul class="list-group-flush lh-lg">
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Volunteering Programs:</strong>
        Participate in various volunteering programs across different branches, including community service, library assistance, and educational outreach.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Internship Opportunities:</strong>
        Discover internship opportunities with leading companies and organizations. Gain valuable work experience and insights into your chosen field.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Meetings with Career Advisors:</strong>
        Schedule one-on-one sessions with career advisors to discuss your career path, resume building, and job search strategies.
      </li>
      <li class="list-group-item">
        <i class="fas fa-square text-primary"></i>
        <strong>Company Meet & Greets:</strong>
        Attend meetings with representatives from companies offering internships and job opportunities. Network and learn about potential career paths and requirements.
      </li>
    </ul>
          <a  class="btn btn-primary text-white mt-4 align-self-start" data-bs-toggle="modal" data-bs-target="#modal2">Choose Your Event</a>
        </div> 
</div>
    </div>
  </div>
</section>

 <!-- Modal 2 -->
    <div id="modal2" class="modal fade">
      <div class="modal-dialog modal-lg mt-7">
        <div class="modal-content p-5">
          <div class="row">
            <div class="col-lg-6">
              <div class="image-container">
                <img src="images/author.png" alt="" class="img-fluid" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="text-container">
                <h3 class="display-6">June 2024 Academic and Career Events</h3>

<p>
  Participate in a variety of academic and career-focused events at UniVerse Library. 
</p>
<ul class="list-group list-group-flush lh-lg mb-3">
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Volunteering Programs:</strong> June 5, 2024 - 10:00 AM at the Main Library. Participate in community service, library assistance, and educational outreach programs.
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Internship Opportunities:</strong> June 12, 2024 - 2:00 PM at the West Campus Branch. Discover internship opportunities with leading companies and organizations.
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Meetings with Career Advisors:</strong> June 18, 2024 - 11:00 AM at the East Campus Branch. Schedule one-on-one sessions to discuss your career path, resume building, and job search strategies.
  </li>
  <li class="list-group-item">
    <i class="fas fa-square text-primary"></i>
    <strong>Company Meet & Greets:</strong> June 25, 2024 - 3:00 PM at the North Campus Branch. Attend meetings with representatives from companies offering internships and job opportunities.
  </li>
</ul>
                <a href="" class="btn btn-primary text-white">Register for Event</a>
                <button class="btn btn-light" data-bs-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FAQ -->
<section class="faq my-5">
  <div class="container">
  <div class="row">
        <h1 class="text-center mb-4">Frequently Asked Questions</h1>
    <div class="col-12">
    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>How do I join the library?
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        Joining the library is easy! You can either register online through our website or visit any of our library branches in person. You'll need to provide proof of identity and address.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>How many items can I borrow?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        Members can borrow up to 10 items at a time. This includes books, DVDs, and other materials available in our collection.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>How long can I borrow items for?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        The borrowing period for most items is 3 weeks. DVDs and other special items may have different borrowing periods, so please check at the time of borrowing.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
         <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>Can I extend the due date?
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        Yes, you can renew your borrowed items if no other member has reserved them. Renewals can be done online through your account, by phone, or in person at any branch.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
         <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>What if I have lost my card?
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        If you have lost your library card, please report it to us immediately. You can visit any branch to get a replacement card. There may be a small fee for issuing a new card.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
       <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>Can I have an item transferred from another library branch?
      </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        Yes, you can request to have an item transferred from another branch to your preferred branch for pickup. This can be done online, over the phone, or in person.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
         <i class="fa-solid fa-clipboard-question fa-2x text-primary me-3"></i>What are the fees & charges?
      </button>
    </h2>
    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        Most library services are free. However, there may be fees for overdue items, lost or damaged items, and certain special services. Please refer to our Fees & Charges page on the website for detailed information.
      </div>
    </div>
  </div>
</div>


  </div>
  </div>
  </div>
</section>
    <!-- Testimonials -->

   <section class="testimonials mb-8">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="" class="rounded-circle mb-3">
        <p class="lead fst-italic">
         "The UniVerse Library has made accessing academic resources so much easier. The workshops and events are incredibly beneficial for my studies."
        </p>
        <p class="fw-bold">Jack Thompson - Sydney, NSW</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="" class="rounded-circle mb-3">
        <p class="lead fst-italic">
         "The professional workshops have been invaluable for my research. The PhD coworking spaces provide a perfect environment for productivity and collaboration."
        </p>
   
        <p class="fw-bold">Emily Davis - Melbourne, VIC</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="https://randomuser.me/api/portraits/men/31.jpg" alt="" class="rounded-circle mb-3">
        <p class="lead fst-italic">
          "Having access to a wide range of academic resources and the ability to collaborate with other researchers has greatly enhanced my research experience."
        </p>
        <p class="fw-bold">Liam Johnson - Brisbane, QLD</p>
      </div>
    </div>
  </div>
</section>


    <!-- Download -->

    <section class="download">
      <div class="container">
        <div class="row">
        <div class="col-lg-5">
<div class="image-container mt-n6 mb-5">
  <img src="images/download-ebook.png" alt="" class="img-fluid">
</div>
        </div>
        <div class="col-lg-7">
          <div class="text-container text-white d-flex flex-column justify-content-center h-100 md-5">
           <h2 class="fw-bold">Stay Updated with UniVerse<i class="fa-solid fa-feather"></i>Lib</h2>
<p>
    Subscribe to our newsletter to stay informed about the latest events, news, and updates from UniVerse Library. Be the first to know about upcoming workshops, book readings, and special programs.
</p>
<!-- Form -->
<form action="subscribe.php" method="post">
    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        <button class="btn btn-primary text-white rounded-end">Subscribe</button>

                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    </section>

    <!-- Social -->

    <section class="social text-bg-dark py-6 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3 text-center fs-4">
<p> Stay connected and join our vibrant community. For any inquiries
              or assistance, feel free to reach out to us</p>
              <div class="social-icons d-flex justify-content-center gap-4">
                <i class="fab fa-facebook fa-2x"></i>
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-instagram fa-2x"></i>
                <i class="fab fa-linkedin fa-2x"></i>
                <i class="fab fa-pinterest fa-2x"></i>
              </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="border-top border-primary bg-dark text-white py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <ul class="nav">
              <li class="nav-item">
                <a href="#index.php" class="nav-link link-light">Home</a>
              </li>
              <li class="nav-item">
                <a href="#details" class="nav-link link-light">Details</a>
              </li>
              <li class="nav-item">
                <a href="#contact.html" class="nav-link link-light">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <p class="text-end d-none d-md-block"> Copyright &copy; UniVerse Lib 2024</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
  const signupForm = document.getElementById("signupForm");

  // Real-time first name validation
  document.getElementById("signupFirstName").addEventListener("input", function () {
    const firstName = this.value;
    const errorDiv = document.getElementById("firstNameError");

    if (!/^[a-zA-Z]*$/.test(firstName) || firstName.length > 50) {
      errorDiv.textContent = "First Name must contain only alpha characters and be no more than 50 characters.";
    } else {
      errorDiv.textContent = "";
    }
  });

  // Real-time last name validation
  document.getElementById("signupLastName").addEventListener("input", function () {
    const lastName = this.value;
    const errorDiv = document.getElementById("lastNameError");

    if (!/^[a-zA-Z]*$/.test(lastName) || lastName.length > 50) {
      errorDiv.textContent = "Last Name must contain only alpha characters and be no more than 50 characters.";
    } else {
      errorDiv.textContent = "";
    }
  });

  // Real-time email validation
  document.getElementById("signupEmail").addEventListener("input", function () {
    const email = this.value;
    const errorDiv = document.getElementById("emailError");

    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email) || email.length > 100) {
      errorDiv.textContent = "Invalid email address or too long.";
    } else {
      errorDiv.textContent = "";
    }
  });

  // Real-time password validation
  document.getElementById("signupPassword").addEventListener("input", function () {
    const password = this.value;
    const errorMessages = [];

    if (password.length < 8) {
      errorMessages.push("Password must be at least 8 characters long.");
    }
    if (!/[A-Z]/.test(password)) {
      errorMessages.push("Password must contain at least one uppercase letter.");
    }
    if (!/[a-z]/.test(password)) {
      errorMessages.push("Password must contain at least one lowercase letter.");
    }
    if (!/[0-9]/.test(password)) {
      errorMessages.push("Password must contain at least one number.");
    }
    if (!/[!@#$%^&*(),.?\":{}|<>]/.test(password)) {
      errorMessages.push("Password must contain at least one special character.");
    }

    const errorDiv = document.getElementById("passwordError");
    errorDiv.innerHTML = errorMessages.join("<br>");
  });

  // Real-time retype password validation
  document.getElementById("signupRetypePassword").addEventListener("input", function () {
    const password = document.getElementById("signupPassword").value;
    const retypePassword = this.value;
    const errorDiv = document.getElementById("retypePasswordError");

    if (password !== retypePassword) {
      errorDiv.textContent = "Passwords do not match.";
    } else {
      errorDiv.textContent = "";
    }
  });

  // Handle form submission
  signupForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(signupForm);

    fetch("signup.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Registration successful!");
          window.location.href = "dashboard.php";
        } else {
          const errorsDiv = document.getElementById("signupErrors");
          errorsDiv.style.display = "block";
          errorsDiv.innerHTML = "<ul>" + data.errors.map((error) => "<li>" + error + "</li>").join("") + "</ul>";
        }
      })
      .catch((error) => console.error("Error:", error));
  });
});
</script>

  </body>
</html>
