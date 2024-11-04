<?php

function answer($kode)
{
    include 'koneksi.php';
    if ($kode == 'G01') {
        echo "<a href='question-page.php?kode=G02'>Ya</a>";
        echo "<a href='question-page.php?kode=G04'>Tidak</a>";
    }
    if ($kode == 'G02') {
        echo "<a href='question-page.php?kode=G03'>Ya</a>";
        echo "<a href='diagnose-page.php?kode=K11'>Tidak</a>";
    }
    if ($kode == 'G02-1') {
        echo "<a href='question-page.php?kode=G07'>Ya</a>";
        echo "<a href='question-page.php?kode=G05-1'>Tidak</a>";
    }
    if ($kode == 'G03') {
        echo "<a href='diagnose-page.php?kode=K01'>Ya</a>";
        echo "<a href='diagnose-page.php?kode=K11'>Tidak</a>";
    }
    if ($kode == 'G04') {
        echo "<a href='question-page.php?kode=G05'>Ya</a>";
        echo "<a href='question-page.php?kode=G02-1'>Tidak</a>";
    }
    if ($kode == 'G04-1') {
        echo "<a href='question-page.php?kode=G05-2'>Ya</a>";
        echo "<a href='question-page.php?kode=G01'>Tidak</a>";
    }
    if ($kode == 'G05') {
        echo "<a href='diagnose-page.php?kode=K02'>Ya</a>";
        echo "<a href='question-page.php?kode=G04-1'>Tidak</a>";
    }
    if ($kode == 'G05-1') {
        echo "<a href='question-page.php?kode=G07-1'>Ya</a>";
        echo "<a href='diagnose-page.php?kode=K12'>Tidak</a>";
    }
    if ($kode == 'G05-2') {
        echo "<a href='question-page.php?kode=G10'>Ya</a>";
        echo "<a href='question-page.php?kode=G01'>Tidak</a>";
    }
    if ($kode == 'G07') {
        echo "<a href='question-page.php?kode=G08'>Ya</a>";
        echo "<a href='question-page.php?kode=G05-1'>Tidak</a>";
    }
    if ($kode == 'G07-1') {
        echo "<a href='question-page.php?kode=G08-1'>Ya</a>";
        echo "<a href='diagnose-page.php?kode=K12'>Tidak</a>";
    }
    if ($kode == 'G08') {
        echo "<a href='diagnose-page.php?kode=K03'>Ya</a>";
        echo "<a href='question-page.php?kode=G05-1'>Tidak</a>";
    }
    if ($kode == 'G08-1') {
        echo "<a href='diagnose-page.php?kode=K04'>Ya</a>";
        echo "<a href='diagnose-page.php?kode=K12'>Tidak</a>";
    }
    if ($kode == 'G10') {
        echo "<a href='diagnose-page.php?kode=K05'>Ya</a>";
        echo "<a href='question-page.php?kode=G01'>Tidak</a>";
    }
}
