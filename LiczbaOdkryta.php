<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liczba odkryta</title>
</head>
<body>
<h1>Liczba odkryta</h1>
<p>Napisz funkcję w języku PHP, która dla podanej liczby dziesiętnej większej od 0 zwraca TRUE, gdy liczba jest odkryta i FALSE w przeciwnym wypadku.</p>
<form method="post">
    <label for="a">Podaj liczbę</label>
    <input type="text" name="a"> <br>

    <button name="submit">WYŚLIJ</button> <br>
</form>
<?php
    function wartosc1($a)
    {
    if(intval($a)<=9)
    {
        return TRUE;
    }
    else if($a[1]!=0)
    {
    if(intval($a)%intval($a[0])!=0 || intval($a)%intval($a[1])!=0)
    {
        return FALSE;
    }
    else if(intval($a)%intval($a[0])==0 && intval($a)%intval($a[1])==0)
    {
        return TRUE;
    }
    }
    else if($a[1]==0)
    {
        return false;
    }
    }
    if(isset($_POST["submit"]))
    {
        $b=$_POST["a"];
        if(wartosc1($b)==TRUE)
        {
            echo "TRUE";
        }
        else echo "FALSE";
    }

?>
</body>
</html>
