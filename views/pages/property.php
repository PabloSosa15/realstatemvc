</div>
    </header>

    <main class="container section content-focused">
        <h1><?php echo $property->titles; ?></h1>
         <img loading="lazy" src="/images/<?php echo $property->images; ?>" alt="Image for the house">

        <div class="abstract-property">
          <p class="price">$<?php echo $property->price; ?></p>

          <ul class="icons-features">
            <li>
              <img class="icons"  loading="lazy" srcset="build/img/icono_wc.svg" alt="wc icon">
              <p><?php echo $property->wc; ?></p>
            </li>

            <li>
              <img class="icons"  loading="lazy" srcset="build/img/icono_estacionamiento.svg" alt="parkin icon">
              <p><?php echo $property->parking; ?></p>
            </li>

            <li>
              <img class="icons"   loading="lazy" srcset="build/img/icono_dormitorio.svg" alt="bedroom icon">
              <p><?php echo $property->rooms; ?></p>
            </li>
          </ul>
          
          <?php echo $property->description; ?>
        </div>
    </main>
    