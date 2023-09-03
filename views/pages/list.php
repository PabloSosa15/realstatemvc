<div class="container-ads">
  <?php foreach ($properties as $property) : ?>
    <div class="ads">
 
      <img loading="lazy" srcset="/images/<?php echo $property->images; ?>" alt="ads">
 
      <div class="ad-content">
        <h3><?php echo $property->titles; ?></h3>
        <p><?php echo $property->description; ?></p>
        <p class="price">$<?php echo $property->price; ?></p>
 
        <ul class="icons-features">
          <li>
            <img class="icons" loading="lazy" srcset="build/img/icono_wc.svg" alt="wc icon">
            <p><?php echo $property->wc; ?></p>
          </li>
 
          <li>
            <img class="icons" loading="lazy" srcset="build/img/icono_estacionamiento.svg" alt="parkin icon">
            <p><?php echo $property->parking; ?></p>
          </li>
 
          <li>
            <img class="icons" loading="lazy" srcset="build/img/icono_dormitorio.svg" alt="bedroom icon">
            <p><?php echo $property->rooms; ?></p>
          </li>
        </ul>
 
        <a href="/property?id=<?php echo $property->id; ?>" class="button-yellow-block">
          View Property
        </a>
 
      </div> <!-- .Ads Content -->
    </div> <!-- .ads-->
 
 
    <?php endforeach; ?>
</div> <!--.ads-container-->