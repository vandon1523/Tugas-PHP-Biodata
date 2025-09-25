<?php
// Tahap 1: Menentukan jumlah orang (pertama kali)
if (!isset($_POST['lanjut']) && !isset($_POST['tambah']) && !isset($_POST['simpan'])) {
    echo "<h2>Program Input Biodata</h2>";
    echo "<form method='post'>";
    echo "Berapa orang yang mau ditambahkan? <br>";
    echo "<input type='number' name='jumlah' min='1' required>";
    echo "<button type='submit' name='lanjut'>Lanjut</button>";
    echo "</form>";
}

// Ambil jumlah orang
if (isset($_POST['lanjut'])) {
    $jumlah = $_POST['jumlah'];
}

if (isset($_POST['tambah'])) {
    $jumlah = $_POST['jumlah'] + 1; // tambah satu orang lagi
}

if (isset($_POST['lanjut']) || isset($_POST['tambah'])) {
    echo "<h2>Masukkan Biodata ($jumlah orang)</h2>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='jumlah' value='$jumlah'>";

    // Jika sebelumnya ada input, simpan sementara supaya tidak hilang
    $panggilan = isset($_POST['panggilan']) ? $_POST['panggilan'] : [];
    $panjang   = isset($_POST['panjang']) ? $_POST['panjang'] : [];
    $usia      = isset($_POST['usia']) ? $_POST['usia'] : [];

    for ($i = 0; $i < $jumlah; $i++) {
        $valPanggilan = isset($panggilan[$i]) ? $panggilan[$i] : '';
        $valPanjang   = isset($panjang[$i]) ? $panjang[$i] : '';
        $valUsia      = isset($usia[$i]) ? $usia[$i] : '';

        echo "<fieldset>";
        echo "<legend>Orang ke-".($i+1)."</legend>";
        echo "Nama Panggilan: <input type='text' name='panggilan[]' value='$valPanggilan' required><br>";
        echo "Nama Panjang: <input type='text' name='panjang[]' value='$valPanjang' required><br>";
        echo "Usia: <input type='number' name='usia[]' value='$valUsia' min='1' required><br>";
        echo "</fieldset><br>";
    }

    echo "<button type='submit' name='tambah'>Tambah Orang</button> ";
    echo "<button type='submit' name='simpan'>Simpan Biodata</button>";
    echo "</form>";
}

// Tahap 3: Menampilkan hasil
if (isset($_POST['simpan'])) {
    $jumlah    = $_POST['jumlah'];
    $panggilan = $_POST['panggilan'];
    $panjang   = $_POST['panjang'];
    $usia      = $_POST['usia'];

    echo "<h2>Hasil Input Biodata</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>No</th><th>Nama Panggilan</th><th>Nama Panjang</th><th>Usia</th></tr>";

    for ($i = 0; $i < $jumlah; $i++) {
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>".$panggilan[$i]."</td>";
        echo "<td>".$panjang[$i]."</td>";
        echo "<td>".$usia[$i]." tahun</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
