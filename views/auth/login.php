</div>
    </header>

    <main class="container section content-focused">
        <h1>Log in</h1>

        <?php foreach($fixs as $fix):?>
            <div class="alert error">
                <?php echo $fix;?>
            </div>
        <?php endforeach;?>
        <form method="POST" class="form" action="/login">
        <legend>Email ands Password</legend>

    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="Your Mail" id="email">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Your Password" id="password">
        </fieldset>

        <input type="submit" value="Log In" class="button button-green">
        </form>
    </main>