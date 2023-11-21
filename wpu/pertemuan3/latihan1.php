<?php
// pengulangan
// for
// while
// do...while
// foreach : pengulangan khusus array

// for
// inisialisasi; kondisi; increment / decrement
for ($i = 0; $i < 5; $i++) {
    echo "Hello World!!<br>";
}
echo "<br>";
// while
$i = 0;
while ($i < 5) {
    echo "Hello World!!<br>";
    $i++;
}
echo "<br>";
// do...while (dijalankan sekali)
$i = 10;
do {
    echo "Hello World!!<br>";
    $i++;
} while ($i < 5);
