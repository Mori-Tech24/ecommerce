<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Web Design AutoCart</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="logo nav__logo">
          <a href="#">Auto<span>Cart</span></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#special">Special</a></li>
        <li><a href="#client">Clients</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="signin">Sign In</a></li>
      </ul>
      <!-- <div class="nav__btn">
        <button class="btn"><i class="ri-shopping-bag-fill"></i></button>
      </div> -->
    </nav>
    <header class="section__container header__container" id="home">
      <div class="header__image">
        <img src="Images/logo.png" alt="header" />
      </div>
      <div class="header__content">
        <h1>FEEL FREE TO SHOP<span>ENJOY</span>.</h1>
        <p class="section__description">
          Introducing AutoCart, the revolutionary push cart management solution that's changing the face of retail.
        </p>
        <div class="header__btn">
          <button class="btn">Get Started</button>
        </div>
      </div>
    </header>

    <section class="section__container special__container" id="special">
      <h2 class="section__header">NEXT GENERATION PUSH CART</h2>
      <p class="section__description">
        REAL TIME PRICING ENABLED BY SENSOR INTEGRATION.
      </p>
      <div class="special__grid">
        <div class="special__card">
          <img src="Images/cart1.png" alt="cart" />
          <h4>CART</h4>
          <p>
            To develop and implement a push cart management system equipped with advanced sensor technology.
          </p>
          <div class="special__ratings">
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
          </div>
          <div class="special__footer">
            <p class="price">$1,719.45</p>
            <button class="btn">Add to Cart</button>
          </div>
        </div>
        <div class="special__card">
          <img src="Images/cart2.png" alt="cart" />
          <h4>CART</h4>
          <p>
            To develop and implement a push cart management system equipped with advanced sensor technology.
          </p>
          <div class="special__ratings">
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
          </div>3
          <div class="special__footer">
            <p class="price">$1,719.45</p>
            <button class="btn">Add to Cart</button>
          </div>
        </div>
        <div class="special__card">
          <img src="Images/cart3.png" alt="cart" />
          <h4>CART</h4>
          <p>
            To develop and implement a push cart management system equipped with advanced sensor technology.
          </p>
          <div class="special__ratings">
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
          </div>
          <div class="special__footer">
            <p class="price">$859.84</p>
            <button class="btn">Add to Cart</button>
          </div>
        </div>
      </div>
    </section>
<!-- 
    <section class="section__container explore__container">
      <div class="explore__image">
        <img src="Images/hart.png" alt="hart" />
      </div>
      <div class="explore__content">
        <h1 class="section__header">We Serve Real Time Pricing Enabled By Sensor Integration</h1>
        <p class="section__description">
          AutoCart aims to establish itself as a market-leading solution in the retail industry. 
          Among retailers and consumers, as well as ongoing research and deveopment to stay ahead of competitors
          and continually innovate in the field of push cart management technology, Join usin creating memories
          together!
        </p>
        <div class="explore__btn">
          <button class="btn">
            Explore Story <span><i class="ri-arrow-right-line"></i></span>
          </button>
        </div>
      </div>
    </section>

    <section class="section__container banner__container">
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-bowl-fill"></i></span>
        <h4>Order Your Cart</h4>
        <p>
          To assist retailers in leveraging AutoCart to enhance customer satisfaction
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-truck-fill"></i></span>
        <h4>Pick Your Cart</h4>
        <p>
          To develop and implement a push cart management system equipped with advanced sensor technology
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
      <div class="banner__card">
        <span class="banner__icon"><i class="ri-star-smile-fill"></i></span>
        <h4>Enjoy Your Cart</h4>
        <p>
          Sit back, relax, as well as ongoing research and development to stay ahead of competitors
          and continually innovate in the field of push cart management technology, knowing that
          your satisfaction is our top priority.
        </p>
        <a href="#">
          Read more
          <span><i class="ri-arrow-right-line"></i></span>
        </a>
      </div>
    </section>

    <section class="section__container client__container" id="client">
      <h2 class="section__header">What Our Customers Are Saying</h2>
      <p class="section__description">
        Discover firsthand experiences and testimonials from our valued patrons.
        Explore the feedback and reviews that showcase our commitment to
        quality, service, and customer satisfaction.
      </p>
      <div class="client__swiper">

        <div class="swiper">
        
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="client__card">
                <p>
                  AutoCart expertise never fails to impress!
                </p>
                <img src="Images/client-1.jpg" alt="client" />
                <h4>David Lee</h4>
                <h5>Business Executive</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client__card">
                <p>
                  I always turn to AutoCart for a quick and comfy cart. Their
                  efficient service and less hassle options never disappoint!
                </p>
                <img src="Images/client-2.jpg" alt="client" />
                <h4>Emily Johnson</h4>
                <h5>Shopping Mommy</h5>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client__card">
                <p>
                  AutoCart has become my go-to for all my grocery needs. Their
                  attention to detail and exceptional customer service make
                  every event a success.
                </p>
                <img src="Images/client-3.jpg" alt="client" />
                <h4>Michael Thompson</h4>
                <h5>Event Planner</h5>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> -->

    <footer class="footer" id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <a href="#">Auto<span>Cart</span></a>
          </div>
          <p class="section__description">
            Welcome to AutoCart Company, the revolutionary push cart management solution
            that's changing the face of retail. Our goal is simple: to streamline the shopping
            experience, empower customers with effortless budget management, and enhance satisfaction
            and loyalty through cutting-edge technology integration. Say hello to the future of retail where
            convenience meets innovation at every aisle.
          </p>
        </div>
        <div class="footer__col">
          <h4>Product</h4>
          <ul class="footer__links">
            <li><a href="#">Menu</a></li>
            <li><a href="#">Specials</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Information</h4>
          <ul class="footer__links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Company</h4>
          <ul class="footer__links">
            <li><a href="#">Our Story</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 AUTOCART . All rights reserved.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
