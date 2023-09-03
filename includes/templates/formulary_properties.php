<fieldset >
                <legend>General Information</legend>

                <label for="titles">Title:</label>
                <input type="text" id="titles" name="property[titles]" placeholder="Property title" value="<?php echo s($property->titles);?>">

                <label for="price">Price:</label>
                <input type="numer" id="price" name="property[price]" placeholder="Property price" value="<?php echo s($property->price);?>">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png" name="property[image]">

                <?php if ($property->images) { ?>
                    <img src="/images/<?php echo $property->images?>" class="small-image">
                <?php };  ?>



                <label for="description">Description:</label>
                <textarea id="description" name="property[description]"><?php echo s($property->description);?></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="room">Rooms:</label>
                <input type="number" id="room" name="property[rooms]" placeholder="Ex: 3" min="1" max="9"  value="<?php echo s($property->rooms);?>">

                
                <label for="wc">Bathroom:</label>
                <input type="number" id="wc" name="property[wc]" placeholder="Ex: 3" min="1" max="9"  value="<?php echo s($property->wc);?>">

                
                <label for="parking">Parking lots:</label>
                <input type="number" id="parking" name="property[parking]" placeholder="Ex: 3" min="1" max="9"  value="<?php echo s($property->parking);?>">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>

                    <label for="Seller">Seller</label>
                <select name="property[sellersid]" id="Seller">
                <?php foreach($sellers as $seller) { ?>
                    <option> <?php echo s($seller->name);?></option>
                    <?php } ?>
                </select>
            </fieldset>