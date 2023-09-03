
      </div>
    </header>

    <main class="container section">
    <h1>More About Us</h1>
    <?php include 'icons.php';?>

    </main>

    <section class="section container">
      <h2>Houses and Apartments for sale</h2>

      <?php
      include 'list.php';
      ?>

      <div class="see-all">
        <a href="/properties" class="button-green"> See All</a>
      </div>
    </section>

    <section class="contact-image">
      <h2>Find the home of your dreams</h2>
      <p>Fill out the contact form and an advisor will be contacting you shortly</p>
      <a href="/contact" class="button-yellow">Contact Us</a>
    </section>

    <div class="container section lower-section">
      <section class="blog">
        <h3>Our blog</h3>
        
        <article class="blog-entry">
          <div class="image">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp">
              <source srcset="build/img/blog1.jpg" type="image/jpeg">
              <img loading="lazy" srcset="build/img/blog1" alt="blog entry text">
            </picture>
          </div>

          <div class="text-entry">
            <a href="entrance.html">
              <h4>Terrace on the roof of your house</h4>
            </a>
              <p class="meta-information">Written on: <span>20/10/2021</span> by: <span>admin</span></p>
              
              <p>
                Tips for building a terrace on the roof of your house with the best materials and saving money
              </p>
          </div>
        </article>

        <article class="blog-entry">
          <div class="image">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp">
              <source srcset="build/img/blog2.jpg" type="image/jpeg">
              <img loading="lazy" srcset="build/img/blog2" alt="blog entry text">
            </picture>
          </div>

          <div class="text-entry">
            <a href="entrance.php">
              <h4>Guide to decorating your home</h4>
            </a>
              <p class="meta-information">Written on: <span>20/10/2021</span> by: <span>admin</span></p>

              <p>
                Maximize the space in your home with this guide, learn to combine furniture and colors to give life to your space
              </p>

          </div>
        </article>
      </section>


    <section class="testimonials">
      <h3>Testimonials</h3>
      <div class="testimonial">
        <blockquote>
          The staff behaved in an excellent way, very good attention and the house that they offered me met all my expectations.
        </blockquote>
        <p>- Pablo Sosa</p>
      </div>
    </section>
  </div>