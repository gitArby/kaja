<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karel PHP</title>
    <style>
        .grid { display: grid; grid-template-columns: repeat(10, 40px); gap: 1px; }
        .cell { width: 40px; height: 40px; border: 1px solid black; text-align: center; vertical-align: middle; }
        .karel { background-color: lightblue; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Karel Robot - PHP</h1>
    <form method="POST" action="karel.php">
        <label for="commands">Zadejte příkazy (jeden na řádek):</label><br>
        <textarea name="commands" rows="10" cols="30"></textarea><br>
        <button type="submit">Proveď</button>
    </form>
    <h2>Aktuální Herní Pole</h2>
    <?php if (isset($_GET['grid'])) echo $_GET['grid']; ?>
</body>
</html>
