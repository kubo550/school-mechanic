<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['mechanikSubmit'])) {
    if ($conn->connect_error) die("Connection error: " . $connect_error);
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];

    $sql = "INSERT INTO `mechanik` (`imie`, `nazwisko`, `telefon`) VALUES ('$imie', '$nazwisko', '$telefon');";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
};

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM `mechanik` WHERE `mechanik`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

if (isset($_POST['editMechanik'])) {
    $id = $_POST['eid'];
    $imie = $_POST['eimie'];
    $nazwisko = $_POST['enazwisko'];
    $telefon = $_POST['etelefon'];

    $sql = "UPDATE `mechanik` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `telefon` = '$telefon' WHERE `mechanik`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}


?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Dodaj Mechanika</h2>
        <hr />

        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Imię</label>
                    <input type="text" required name="imie" class="form-control" placeholder="Sławomir">
                </div>
                <div class="form-group">
                    <label>Nazwisko</label>
                    <input type="text" required name="nazwisko" class="form-control" placeholder="Malinowski">
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" required name="telefon" class="form-control" placeholder="601602603">
                </div>
                <div class="text-center">
                    <button type="submit" name="mechanikSubmit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>

        <hr />
        <h2 class="text-center my-5">Nasi Mechanicy</h2>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th class="text-right px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `mechanik`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["imie"] . "</td>";
                    echo "<td>" . $row["nazwisko"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo  "
                    <td width='20%' class='text-right'>
                        <button class='btn btn-info'> 
                        <a href='editMechanicy.php?edit=" . $row["id"] . "'>
                            <i class='fas fa-edit text-light'></i>
                        </button>
                        <button class='btn btn-danger'>
                            <a href='" . $_SERVER['PHP_SELF'] . "?delete=" . $row["id"] . "'>
                                <i class='fas fa-trash text-light'></i> 
                            </a>
                        </button> 
                    </td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>