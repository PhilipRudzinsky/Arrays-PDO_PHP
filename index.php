<!DOCTYPE html>
<!-- saved from url=(0050)https://graczyk.pwsz.glogow.pl/Zadania_php/z85.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 85</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }
        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="alert alert-info" style="border-left: 2px dotted #48D1CC;">
        <h2>Zadanie 85</h2>
        <p>Napisz program, który dla trzech liczb całkowitym n, min, max wyświetla n liczb pseudolosowych z zakresu &lt;min, max&gt;. </p>
        <form action="index.php" method="POST">
            podaj n: <input type="text" name="n">
            podaj min: <input type="text" name="min">
            podaj max: <input type="text" name="max">
            <input type="submit" name="submit" value="Wyślij">
            <h1>Wynik:
                <?php
                if(isset($_POST["submit"])) {
                    $n = $_POST["n"];
                    $min = $_POST["min"];
                    $max = $_POST["max"];
                    for ($i = 0; $i < $n; $i++) {
                        echo rand($min,$max);
                    }
                }
                ?></h1>

        </form>

    </div>
    </div>
</div>
</body>
</html>

