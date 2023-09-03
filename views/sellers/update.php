<main class="container section">
        <h1>Update Seller</h1>
        <a href="/admin" class="button button-green">Back</a>

        <?php foreach($fixs as $fix): ?>
            <div class="alert error">
            <?php echo $fix; ?>
            </div>

        <?php endforeach; ?>

        <form class="form" method="POST">

            <?php include 'formulary.php'; ?>

            <input type="submit" value="Save Change" class="button button-green">
        </form>

    </main>