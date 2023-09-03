</div>
    </header>

    <main class="container section">
        <h1>Contact</h1>

        <?php if($message) {?>
           <p class='success alert'> <?php echo $message; ?></p>
       <?php } ?>
          
        <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp">
          <source srcset="build/img/destacada3.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/destacada3.jpg" alt="Image Contact">
        </picture>

        <h2>Fill out the contact form</h2>

        <form class="form" action="/contact" method="POST">
          <fieldset>
            <legend>Personal information</legend>

            <label for="name">Name</label>
            <input type="text" placeholder="Your Name" id="name" name="contact[name]" required>

            <label for="message">Message</label>
            <textarea id="message"  name="contact[message]" required></textarea>
          </fieldset>

          <fieldset>
            <legend>Information</legend>

            <label for="options">Sell or buy</label>
            <select id="options"  name="contact[type]" required>
              <option value="" disabled selected>-- Select --</option>
              <option value="buy">Buy</option>
              <option value="sell">Sell</option>
            </select>
                  
            <label for="budget">Price or Budget</label>
            <input type="number" placeholder="Your Price or Budget" id="budget"  name="contact[price]" required>

          </fieldset>

          <fieldset>
            <legend>Contact</legend>

            <p>How do you want to be contacted?</p>
            <div class="form-contact">
              <label for="contact-phone">Phone</label>
              <input type="radio" value="phone" id="contact-phone"  name="contact[contact]" required>

              <label for="contact-email">E-mail</label>
              <input type="radio" value="email" id="contact-email" name="contact[contact]" required>
            </div>

            <div id="contact"></div>



          </fieldset>

          <input type="submit" value="Send" class="button-green">
        </form>
    </main>