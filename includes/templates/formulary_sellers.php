<fieldset>
                <legend>Property Information</legend>

                <label for="name">Name:</label>
                <input type="text" id="name" name="sellers[name]" placeholder="Seller Name" min="1" max="9"  value="<?php echo s($seller->name);?>">

                <label for="last name">Last name:</label>
                <input type="text" id="last name" name="sellers[lastname]" placeholder="Last Name" min="1" max="9"  value="<?php echo s($seller->lastname);?>">
</fieldset>

<fieldset>
    <legend>Extra information</legend>
    <label for="Phone Number">Phone Nomber:</label>
    <input type="number" id="phone number" name="sellers[phonenumber]" placeholder="Phone Number" value="<?php echo s($seller->phonenumber);?>">
    <label for="Email">Email:</label>
    <input type="email" id="email" name="sellers[email]" placeholder="Email" value="<?php echo s($seller->email);?>">
    
</fieldset>