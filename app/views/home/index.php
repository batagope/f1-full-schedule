<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formula 1 Races in Season 2022</title>
</head>
<body>
    <div class="container">
        <h1>Formula 1 Races in Season 2022</h1>
        <a class="btn btn-primary" href="/home/create" role="button">Create New Race</a>
        <table class="table table-bordered table-striped">
            <?php 

            foreach($data['races'] as $race) {
                $buttons = <<<BUTTONS
                <tr>
                    <td> Formula 1 $race->name 2022</td>
                    <td>
                        <a class='btn btn-warning' href='/home/show/$race->id' role='button'>View</a>
                        <a class='btn btn-success' href='/home/edit/$race->id' role='button'>Edit</a>
                        <!-- ovde se treba ubaciti confirm prompt pre nego sto se obrise zapis -->
                        <form action='/home/delete/$race->id' method='post'>
                            <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                        </form>
                    </td>
                </tr>
                BUTTONS;

                echo $buttons;
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>