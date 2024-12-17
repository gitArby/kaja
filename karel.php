<?php
session_start();

$gridSize = 10;
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, $gridSize, array_fill(0, $gridSize, ''));
    $_SESSION['x'] = 0; $_SESSION['y'] = 0; $_SESSION['direction'] = 'right';
}

$directions = ['right', 'down', 'left', 'up'];

function rotateLeft(&$direction) {
    global $directions;
    $index = (array_search($direction, $directions) + 1) % 4;
    $direction = $directions[$index];
}

function moveForward(&$x, &$y, $direction, $steps) {
    switch ($direction) {
        case 'right': $x = min(9, $x + $steps); break;
        case 'down': $y = min(9, $y + $steps); break;
        case 'left': $x = max(0, $x - $steps); break;
        case 'up': $y = max(0, $y - $steps); break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commands = explode("\n", $_POST['commands']);

    foreach ($commands as $command) {
        $parts = explode(' ', trim(strtoupper($command)));
        $cmd = $parts[0] ?? '';
        $param = $parts[1] ?? '';

        if ($cmd === 'KROK') {
            $steps = $param ? intval($param) : 1;
            moveForward($_SESSION['x'], $_SESSION['y'], $_SESSION['direction'], $steps);
        } elseif ($cmd === 'VLEVO') {
            $rotations = $param ? intval($param) : 1;
            for ($i = 0; $i < $rotations; $i++) rotateLeft($_SESSION['direction']);
        } elseif ($cmd === 'POLOZ') {
            $_SESSION['grid'][$_SESSION['y']][$_SESSION['x']] = $param;
        } elseif ($cmd === 'RESET') {
            $_SESSION['grid'] = array_fill(0, $gridSize, array_fill(0, $gridSize, ''));
            $_SESSION['x'] = 0; $_SESSION['y'] = 0; $_SESSION['direction'] = 'right';
        }
    }
}

function displayGrid() {
    global $gridSize;
    $grid = $_SESSION['grid'];
    $x = $_SESSION['x']; $y = $_SESSION['y'];

    echo '<div class="grid">';
    for ($i = 0; $i < $gridSize; $i++) {
        for ($j = 0; $j < $gridSize; $j++) {
            $class = ($i === $y && $j === $x) ? 'cell karel' : 'cell';
            $content = $grid[$i][$j];
            echo "<div class='$class'>$content</div>";
        }
    }
    echo '</div>';
}

ob_start();
displayGrid();
$gridHTML = ob_get_clean();
header("Location: index.php?grid=" . urlencode($gridHTML));
exit();
