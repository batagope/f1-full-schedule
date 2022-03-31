<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Formula 1 Race</title>
</head>
<!-- kreirati layout fajl od ovog dela i onda u body delu ubacivati razlicite delove stranica -->
<body>
    <div class="container">

    <?php $race = $data['race']; ?>
    <!-- ovaj deo je isti kao i u create.php view-u. Moze se kreirati jedan view i na osnovu submit name prikazati odgovarajuci -->
    <h1>Edit Formula 1 race</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $race->name; ?>">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo $race->country; ?>">
            </div>
            <!-- ubaciti datepickere za polja start date i end date -->
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $race->start_date; ?>">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo $race->end_date; ?>">
            </div>
            <div class="mb-3">
                <label for="laps" class="form-label">Laps</label>
                <input type="number" class="form-control" min="0" max="100" id="laps" name="laps" value="<?php echo $race->laps; ?>">
            </div>
            <div class="mb-3">
                <label for="winner" class="form-label">Winner</label>
                <input type="text" class="form-control" id="winner" name="winner" value="<?php echo $race->winner; ?>">
            </div>
            <div class="mb-3">
                <label for="constructor_winner" class="form-label">Constructor Winner</label>
                <input type="text" class="form-control" id="constructor_winner" name="constructor_winner" value="<?php echo $race->constructor_winner; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
            <a class="btn btn-danger" href="/home/index" role="button">Cancel</a>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>