<main class="container section">
        <h1>Crear</h1>
        <a href="/admin" class="button button-green">Back</a>


        <?php foreach($fixs as $fix): ?>
            <div class="alert error">
            <?php echo $fix; ?>
            </div>
        <?php endforeach; ?>


        <form class="form" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulary.php';?>
        <input type="submit" value="Create Property" class="button button-green">

        </form>
    
</main>