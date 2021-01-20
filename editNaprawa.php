<?php
require_once("connect.php");
$id = $_GET['edit'];

$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT id, data_naprawy, kwota  FROM naprawa WHERE id = $id";
if ($res = $conn->query($query)) {
    $row =  $res->fetch_assoc();

    $data = $row['data_naprawy'];
    $kwota = $row['kwota'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edycja Naprawy</h2>
        <hr />

        <div class="form-wrapper">
            <form action="naprawa.php" method="POST">

                <input type="hidden" value="<?php echo $id ?>" name="eid">

                <div class="form-group">
                    <input type="date" value="<?php echo $data ?>" required name="edata" class="form-control" placeholder="Data">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $kwota ?>" required name="ekwota" class="form-control" placeholder="Kwota">
                </div>


                <div class="text-center">
                    <button type="submit" name="editNaprawa" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>