</header>

<main class="container section">
    <h1>Administrador de Bienes Raices</h1>

    <?php
    if($result) {
    $message = showAlert( intval($result));
    if($message) { ?>
       <p class="success alert"> <?php echo s($message)?></p>
    <?php } }?>


    <a href="/properties/create" class="button button-green">New Property</a>
    <a href="/sellers/create" class="button button-yellow">New Sellers</a>

    <h2> Properties </h2>
    <table class="properties">
        <thead>
            <tr>
                </tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
        </thead>

        <tbody> <!-- Show Results -->
            <?php foreach( $properties as $property ): ?>
            <tr>
                <td><?php echo $property->id; ?></td>
                <td><?php echo $property->titles; ?></td>
                <td> <img src="/images/<?php echo $property->images; ?>" class="table-image" </td>
                <td>$ <?php echo $property->price; ?></td>
                <td>
                    <form method="POST" action="/properties/delete" class="w-100">

                    <input type="hidden" name="id" value="<?php echo $property->id;; ?> ">
                    <input type="hidden" name="type" value="property">

                    <input type="submit" class="button-red-block" value="Delete">
                    </form>

                    <a href="properties/update?id=<?php echo $property->id; ?>" class="button-yellow-block" >Update</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2> Sellers </h2>

<table class="properties">
    <thead>
        <tr>
            </tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Actions</th>
    </thead>

    <tbody> <!-- Show Results -->
        <?php foreach( $sellers as $seller ): ?>
        <tr>
            <td><?php echo $seller->id; ?></td>
            <td><?php echo $seller->name . " " . $seller->lastname; ?></td>
            <td> <?php echo $seller->phonenumber; ?></td>
            <td> <?php echo $seller->email; ?></td>
            <td>
                <form method="POST" action="/sellers/delete" class="w-100">

                <input type="hidden" name="id" value="<?php echo $seller->id; ?> ">
                <input type="hidden" name="type" value="seller">

                <input type="submit" class="button-red-block" value="Delete">
                </form>

                <a href="sellers/update?id=<?php echo $seller->id; ?>" class="button-yellow-block" >Update</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</main>