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
            <form action="newclient.php" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Imię</label>
                    <input type="text" name="imie" class="form-control" placeholder="Jakub">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Nazwisko</label>
                    <input type="text" name="nazwisko" class="form-control" placeholder="Kurdziel">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Telefon</label>
                    <input type="text" name="telefon" class="form-control" placeholder="601602603">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Adres</label>
                    <input type="text" name="adres" class="form-control" placeholder="krakow 15">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>