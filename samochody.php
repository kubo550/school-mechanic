<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <link rel="stylesheet" href="./css/app.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <title>Kurdziel serwis</title>

</head>

<body>
    <?php echo file_get_contents('header.php'); ?>

    <div class="container">
        <div class="form-wrapper">
            <form action="newcar.php" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Marka</label>
                    <input type="text" name="marka" class="form-control" placeholder="Opel">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Model</label>
                    <input type="text" name="model" class="form-control" placeholder="Astra">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Rocznik</label>
                    <input type="text" name="rocznik" class="form-control" placeholder="2001">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Przebieg</label>
                    <input type="number" name="przebieg" class="form-control" placeholder="30000">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>