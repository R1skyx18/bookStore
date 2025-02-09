<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Book Store</title>
</head>
<?php
    session_start();

    $con=mysqli_connect('localhost','root','') or die("No Connection!!");
    mysqli_select_db($con,"test");
        
    if(isset($_POST["login"]))
    {
        $uname=$_POST["un"];
        $pass=$_POST["pas"];
        $_SESSION["uname"]=$uname;
        $q1="select * from users where user_name='$uname' and password='$pass';";
        $q12=mysqli_query($con,$q1);
        if($a=mysqli_fetch_array($q12))
            header('location: admin.php');
        else
            echo "Invalid username or password";
    }

    if(isset($_POST["register"]))
    {
        $uname=$_POST["un"];
        $pass=$_POST["pas"];
        $q1="insert into users values('$uname','$pass');";
        mysqli_query($con,$q1);
    }

    ?>

<body>
    <section class="main">
        <nav>
            <!--header-->
            <div class="nav-bar">
                <i class="fa-solid fa-bars sidebarOpen"></i>
                <div class="logo">
                    <img src="image/logo.png">
                </div>
                <div class="menu">
                    <div class="logo-toggle">
                        <span class="menu-logo"><a href="#">bookStore</a></span>
                        <i class="fa-solid fa-x sidebarClose"></i>
                    </div>
                    <ul class="nav-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#featured">Featured</a></li>
                        <li><a href="#arrivals">Arrivals</a></li>
                        <li><a href="#reviews">Reviews</a></li>
                        <li><a href="#blog">Blog</a></li>
                    </ul>
                </div>
                <div class="social_icon">
                    <div class="search-container">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <i class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-right-to-bracket login-btn"></i>
                    </div>
                </div>
            </div>
        </nav>
        <!--==========-->


        <!--home-->
        <section id="home" class="home">
            <div class="main">
                <div class="main_tag">
                    <h1>WELCOME TO<br><span>BOOK STORE</span></h1>
                    <p>Discover a world of stories, knowledge, and imagination!
                        At our Book Store, we believe every book holds the power to inspire, educate, and entertain.
                        Explore our carefully curated collection and find your next favorite read.
                        Whether you’re a lover of fiction, a seeker of wisdom, or an adventurer in spirit, we have
                        something special for everyone. Let your journey begin here!</p>
                    <a href="#about" class="main_btn">Learn More</a>
                </div>
                <div class="main_img">
                    <img src="image/table.png">
                </div>
            </div>
        </section>
        <!--==========-->


        <!--script-->
        <script>
            /*===variable declarations===*/
            body = document.querySelector("body"),
                nav = document.querySelector("nav"),
                sidebarOpen = document.querySelector(".sidebarOpen"),
                sidebarClose = document.querySelector(".sidebarClose");
            /*===listener open===*/
            sidebarOpen.addEventListener("click", () => {
                nav.classList.add("active");
            });
            /*===listener close===*/
            body.addEventListener("click", e => {
                let clickedElm = e.target;
                if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                    nav.classList.remove("active");
                }
            });
        </script>
        <!--==========-->

        <!--search-->
        <div id="popup" class="popup">
            <div class="popup-search">
                <h1>BOOK STORE</h1>
                <i class="fa-solid fa-x close" id="close"></i>
                <input type="text" id="search-bar" placeholder="Search here...">
                <button id="search-button">Search</button>
                <div class="message" id="message"></div>
            </div>
        </div>

        <!--login-->
        <div id="login-popup" class="login-popup">
            <form method="post" class="login-form">
                <h1>Login</h1>
                <i class="fa-solid fa-x close" id="close"></i>
                <input type="text" name="un" placeholder="Username">
                <input type="password" name="pas" placeholder="Password">
                <input class="button" type="submit" value="Login" name="login">
                <div class="register-btn" id="register-btn">New user ?</div>
            </form>
        </div>

        <div id="register-popup" class="register-popup">
            <form method="post" class="register-form">
                <h1>register</h1>
                <i class="fa-solid fa-x close" id="close"></i>
                <input type="text" name="un" placeholder="Username">
                <input type="password" name="pas" placeholder="Password">
                <input class="button" type="submit" value="add user" name="register">
            </form>
        </div>
        <!--==========-->

        <!--cards-->
        <div class="container">
            <div class="card">
                <div class="icon">🚚</div>
                <h3>Fast Delivery</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="card">
                <div class="icon">🎧</div>
                <h3>24 x 7 Services</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="card">
                <div class="icon">🏷️</div>
                <h3>Best Deal</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="card">
                <div class="icon">🔒</div>
                <h3>Secure Payment</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <!--==========-->


        <!--paragraph-->
    </section>
    <section id="about" class="about">
        <div class="about">
            <div class="about_image">
                <img src="image/about.png">
            </div>
            <div class="about_tag">
                <h1>About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae cumque atque dolor corporis
                    architecto. Voluptate expedita molestias maxime officia natus consectetur dolor quisquam illo?
                    Quis illum nostrum perspiciatis laboriosam perferendis? Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Minus ad eius saepe architecto aperiam laboriosam voluptas nobis voluptates
                    id amet eos repellat corrupti harum consectetur, dolorum dolore blanditiis quam quo.</p>
                <a href="#" class="about_btn">Learn More</a>
            </div>
    </section>
    </div>
    <!--==========-->


    <!--featured books-->
    <section id="featured" class="featured">
        <div class="featured_books">
            <h1>Featured Books</h1>
            <div class="featured_book_box">
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_1.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_2.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_3.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_4.jpg">
                    </div>

                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_5.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_6.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_7.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_8.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_9.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_10.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_11.jpg">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_12.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_13.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_14.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="image/book_15.png">
                    </div>
                    <div class="featurde_book_tag">
                        <h2>Featured Books</h2>
                        <p class="writer">John Deo</p>
                        <div class="categories">Thriller, Horror, Romance</div>
                        <p class="book_price">$25.50<sub><del>$28.60</del></sub></p>
                        <a href="#" class="f_btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========-->


    <!--arrivals-->
    <section id="arrivals" class="arrivals">
        <h1>New Arrivals</h1>
        <div class="arrivals_box">
            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_1.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>The Giver</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_2.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>The Wright Brothers</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_3.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Radical Gardening</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_4.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Red Queen</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_5.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>To Kill a Mockingbird</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_6.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Harry Potter and the Philosopher's Stone</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_7.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Heroes of Olympus</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_8.webp">
                </div>
                <div class="arrivals_tag">
                    <span>Diary of a Wimpy Kid</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_9.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Ranger's Apprentice</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="image/arrival_10.jpg">
                </div>
                <div class="arrivals_tag">
                    <span>Percy Jackson and the Lightning Thief</span>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>
    </section>
    <!--==========-->


    <!--reviews-->
    <section id="reviews" class="reviews">
        <h1>Reviews</h1>
        <div class="review_box">
            <div class="review_card">
                <i class="fa-solid fa-quote-right"></i>
                <div class="card_top">
                    <img src="image/review_1.png">
                </div>
                <div class="cards">
                    <h2>John Deo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus eos doloribus iure
                        distinctio! Eos dolorem quam, nisi amet saepe totam quas quidem laboriosam dolore,
                        tenetur itaque nostrum voluptas excepturi aut.</p>
                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                </div>
            </div>

            <div class="review_card">
                <i class="fa-solid fa-quote-right"></i>
                <div class="card_top">
                    <img src="image/review_2.png">
                </div>
                <div class="cards">
                    <h2>John Deo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus eos doloribus iure
                        distinctio! Eos dolorem quam, nisi amet saepe totam, quas quidem laboriosam dolore,
                        tenetur itaque nostrum voluptas excepturi aut.</p>
                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                </div>
            </div>
            <div class="review_card">
                <i class="fa-solid fa-quote-right"></i>
                <div class="card_top">
                    <img src="image/review_3.png">
                </div>
                <div class="cards">
                    <h2>John Deo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus eos doloribus iure
                        distinctio! Eos dolorem quam, nisi amet saepe totam, quas quidem laboriosam dolore,
                        tenetur itaque nostrum voluptas excepturi aut.</p>
                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                </div>
            </div>
            <div class="review_card">
                <i class="fa-solid fa-quote-right"></i>
                <div class="card_top">
                    <img src="image/review_4.png">
                </div>
                <div class="cards">
                    <h2>John Deo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus eos doloribus iure
                        distinctio! Eos dolorem quam, nisi amet saepe totam quas quidem laboriosam dolore,
                        tenetur itaque nostrum voluptas excepturi aut.</p>
                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="banner">
            <a href="#" class="banner_btn">Learn More</a>
        </div>
    </section>
    <!--==========-->


    <!--blogs-->
    <section id="blog" class="blog">
        <h1>Our Blog</h1>
        <div class="blog_box">
            <div class="blog_card">
                <div class="blog_img">
                    <img src="image/blog_1.jpg">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, quos quis quasi ut
                        impedit reiciendis voluptatem rem esse ratione omnis, laudantium earum. Aperiam
                        nesciunt dolore aliquam repellat consequatur amet ducimus.</p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="blog_card">
                <div class="blog_img">
                    <img src="image/blog_2.jpg">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, quos quis quasi ut
                        impedit reiciendis voluptatem rem esse ratione omnis laudantium earum. Aperiam
                        nesciunt dolore aliquam repellat consequatur amet ducimus.</p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="blog_card">
                <div class="blog_img">
                    <img src="image/blog_3.jpg">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, quos quis quasi ut
                        impedit reiciendis voluptatem rem esse ratione omnis laudantium earum. Aperiam
                        nesciunt dolore aliquam repellat consequatur amet ducimus.</p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========-->


    <!--footer-->
    <section id="footer" class="footer">
        <footer class="footer_main">
            <div class="tag">
                <img src="image/logo.png">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est quaerat ipsa aspernatur ad
                    sequi, dolore eveniet vitae quasi. Excepturi ipsa odio</p>
            </div>
            <div class="tag quick_link">
                <h1>Quick Link</h1>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#featured">Featured</a>
                <a href="#blog">Blog</a>
            </div>
            <div class="tag contact_info">
                <h1>Contact Info</h1>
                <a href="#"><i class="fa-solid fa-phone"></i>+94 12 345 6789</a>
                <a href="#"><i class="fa-solid fa-phone"></i>+94 32 444 699</a>
                <a href="#"><i class="fa-solid fa-envelope"></i>bookstore123@gmail.com</a>
            </div>
            <div class="tag social_link">
                <h1>Follow Us</h1>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
            <div class="tag news_letter">
                <h1>Newsletter</h1>
                <div class="search_bar">
                    <input type="text" placeholder="You email id here">
                    <button type="submit">Subscribe</button>
                </div>
            </div>
        </footer>
        <!--==========-->


    </section>
    <script src="script.js"></script>
</body>

</html>