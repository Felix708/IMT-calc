<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator IMT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center">IMT ✈️</h2>
            <h4 class="text-center" id="result">
                <?php
                $hasil = "Masukkan Data"; // Default tampilan sebelum input

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $berat = isset($_POST["berat"]) ? floatval($_POST["berat"]) : 0;
                    $tinggi = isset($_POST["tinggi"]) ? floatval($_POST["tinggi"]) : 0;

                    if ($tinggi > 3) {
                        $tinggi = $tinggi / 100; // Konversi ke meter
                    }

                    if ($tinggi > 0 && $berat > 0) {
                        $imt = $berat / ($tinggi * $tinggi);

                        $imt = round($imt, 1);

                        if ($imt < 17) {
                            $hasil = "Sangat Kurus";
                        } elseif ($imt >= 17 && $imt < 18.5) {
                            $hasil = "Kurus";
                        } elseif ($imt >= 18.5 && $imt < 25) {
                            $hasil = "Normal";
                        } elseif ($imt >= 25 && $imt < 30) {
                            $hasil = "Gemuk";
                        } else {
                            $hasil = "Obesitas";
                        }
                        echo $imt;
                        echo "<br>";
                    }
                }

                echo $hasil;
                ?> 
                </h4>
            <form action="" method="POST">
                <div class="form">
                    <input type="number" step="0.1" name="berat" placeholder="Berat badan (kg)" min="1" required>
                </div>
                <div class="form">
                    <input type="number" step="0.1" name="tinggi" placeholder="Tinggi badan (cm)" min="1" required>
                </div>
                <div class="gender">
                    <select class="form-select" name="gender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>
