<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "3_pir_biblioteka";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Nie udało się połączyć z bazą danych: " . $e->getMessage());
}

class Rekord {
    public $id;
    public $imie;
    public $nazwisko;

    function __construct($id, $imie, $nazwisko) {
        $this->id = $id;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
    }
}

class Tabela {
    public $nazwa;
    private $conn;

    function __construct($nazwa, $conn) {
        $this->nazwa = $nazwa;
        $this->conn = $conn;
    }

    function dodajRekord($imie, $nazwisko) {
        $sql = "INSERT INTO " . $this->nazwa . " (imie, nazwisko) VALUES (:imie, :nazwisko)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':imie', $imie);
        $stmt->bindParam(':nazwisko', $nazwisko);
        $stmt->execute();
    }

    function pobierzRekordy() {
        $rekordy = array();
        $sql = "SELECT * FROM " . $this->nazwa;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $rekordy[] = new Rekord($row["id"], $row["imie"], $row["nazwisko"]);
        }
        return $rekordy;
    }
}

$tabela = new Tabela("czytelnicy", $conn);

if (isset($_POST["dodaj"])) {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $tabela->dodajRekord($imie, $nazwisko);
}

if (isset($_POST["wyswietl"])) {
    $rekordy = $tabela->pobierzRekordy();
    foreach ($rekordy as $rekord) {
        echo $rekord->id . " " . $rekord->imie . " " . $rekord->nazwisko . "<br>";
    }
}

?>
<form method="post">
    Imię: <input type="text" name="imie"><br>
    Nazwisko: <input type="text" name="nazwisko"><br>
    <input type="submit" name="dodaj" value="Dodaj">

</form>
<form method="post">
    <input type="submit" name="wyswietl" value="Wyświetl">
</form>