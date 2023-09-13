<fieldset>
                <legend>Property Information</legend>

                <label for="name">Name:</label>
                <input type="text" id="name" name="sellers[name]" placeholder="Seller Name"  value="<?php echo s($seller->name);?>">

                <label for="lastname">Last name:</label>
                <input type="text" id="lastname" name="sellersid[lastname]" placeholder="Last Name" value="<?php echo s($seller->lastname);?>">
</fieldset>

<fieldset>
    <legend>Extra information</legend>
    <label for="Phone Number">Phone Nomber:</label>
    <input type="number" id="phonenumber" name="sellers[phonenumber]" placeholder="Phone Number" value="<?php echo s($seller->phonenumber);?>">
    <label for="Email">Email:</label>
    <input type="email" id="email" name="sellers[email]" placeholder="Email" value="<?php echo s($seller->email);?>">
    
</fieldset>