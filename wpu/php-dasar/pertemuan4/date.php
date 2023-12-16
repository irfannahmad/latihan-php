<?php
// date
// menampilkan tanggal dengan format tertentu
echo date("l");
echo "<br>";
echo date("d");
echo "<br>";
echo date("M");
echo "<br>";
echo date("l, d-M-Y");
echo "<br>";

// time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 januari 1970
echo time();
echo "<br>";
echo date("l", time() + 172800);
echo "<br>";
echo date("l, d-M-Y", time() + 60 * 60 * 24 * 100);
echo "<br>";
echo date("l, d-M-Y", time() - 60 * 60 * 24 * 100);
echo "<br>";

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
echo mktime(0, 0, 0, 10, 24, 2002);
echo "<br>";
echo date("l", mktime(0, 0, 0, 10, 24, 2002));
echo "<br>";
echo strtotime("24 oct 2002");
echo "<br>";
echo date("l", strtotime("24 oct 2002"));
echo "<br>";
