<?php
    session_start();
    if(isset($_POST["register"])) {
        $count = 0;
        $nik = $_POST['nik'];
        $telp = $_POST['no-hp'];
        $pos = $_POST['kode-pos'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $_SESSION["error_nik"] = "";
        $_SESSION["error_telp"] = "";
        $_SESSION["error_pos"] = "";
        $_SESSION["error_pass"] = "";
        $_SESSION["error_img"] = "";

        if (strlen($nik) != 16) {
            $_SESSION['error_nik'] .= 'NIK harus 16 digit';
            $count++;
        }
        if (strlen($telp) < 11 || !str_starts_with($telp, '08')) {
            $_SESSION['error_telp'] .= 'No HP minimal 11 digit angka dan dimulai dengan 08';
            $count++;
        }
        if (strlen($pos) != 5) {
            $_SESSION['error_pos'] .= 'Kode Pos harus 5 digit>';
            $count++;
        }
        if ($pass1 != $pass2) {
            $_SESSION['error_pass'] .= 'Password 1 harus sama dengan Password 2';
            $count++;
        } else {
            $_SESSION['password1'] = $pass1;
            $_SESSION['password2'] = $pass2;
        }

        $_SESSION['nama-depan'] = $_POST['nama-depan'];
        $_SESSION['nama-tengah'] = $_POST['nama-tengah'];
        $_SESSION['nama-belakang'] = $_POST['nama-belakang'];
        $_SESSION['tempat-lahir'] = $_POST['tempat-lahir'];
        $_SESSION['tanggal-lahir'] = $_POST['tanggal-lahir'];
        $_SESSION['warga-negara'] = $_POST['warga-negara'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['alamat'] = $_POST['alamat'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['nik'] = $nik;
        $_SESSION['no-hp'] = $telp;
        $_SESSION['kode-pos'] = $pos;

        $namaFile = $_FILES['foto-profil']['name'];
        $tempName = $_FILES['foto-profil']['tmp_name'];

        $ekstensiGambarValid = ["jpeg", "png", "jpg"];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $_SESSION["error_img"] .= "File harus berformat png / jpg / jpeg";
            $count++;
        }

        if($count != 0) {
            header('Location: register.php');
            $count = 0;
        } else {    
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tempName, 'image/' . $namaFileBaru);
            $_SESSION['foto-profil'] = $namaFileBaru;
            $_SESSION["register"] = "true";
            header('Location: login.php');
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <style>
        input[type=submit] {
            background-color: #adf59f;
            border-radius: 3px;
            border: 1px solid #000;
            box-shadow: rgb(88, 88, 88) 0px 1px 2px;
            padding:2px 10px 2px 10px;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <p class="register-header">Register</p>
        <div class="form-register-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="info">
                    <div class="regis-info">
                        <div class="nama-depan" style="margin-bottom: 1rem;width:100%">
                            <label for="nama-depan" style="width:20%;margin-right: 1rem;">Nama Depan</label>
                            <input type="text" name="nama-depan" id="nama-depan" style="width:70%" required value="<?= isset($_SESSION["nama-depan"])? $_SESSION["nama-depan"] : ""; ?>">
                        </div>
                        <div class="tempat-lahir" style="margin-bottom: 1rem;">
                            <label for="tempat-lahir" style="width:20%;margin-right: 0.9rem;">Tempat Lahir</label>
                            <input type="text" name="tempat-lahir" id="tempat-lahir" style="width:70%" required value="<?= isset($_SESSION["tempat-lahir"])? $_SESSION["tempat-lahir"] : ""; ?>">
                        </div>
                        <div class="warga-negara" style="margin-bottom: 1rem;">
                            <label for="warga-negara" style="width:20%;margin-right: 0.6rem;">Warga Negara</label>
                            <input type="text" name="warga-negara" id="warga-negara" style="width:70%" required value="<?= isset($_SESSION["warga-negara"])? $_SESSION["warga-negara"] : ""; ?>">
                        </div>
                        <div class="alamat" style="margin-bottom: 1rem;">
                            <label for="alamat" style="width:20%;margin-right: 3.3rem;">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="23" rows="3" style="vertical-align: top;width:70%" required><?= isset($_SESSION["alamat"])? $_SESSION["alamat"] : ""; ?></textarea>
                        </div>
                        <div class="username">
                            <label for="username" style="width:20%;margin-right: 2.2rem;">Username</label>
                            <input type="text" name="username" id="username" style="width:70%" required value="<?= isset($_SESSION["username"])? $_SESSION["username"] : ""; ?>">
                        </div>
                    </div>
                    <div class="regis-info">
                        <div class="nama-tengah" style="margin-bottom: 1rem;">
                            <label for="nama-tengah" style="width:20%;margin-right: 1rem;">Nama Tengah</label>
                            <input type="text" name="nama-tengah" id="nama-tengah" style="width:70%" required value="<?= isset($_SESSION["nama-tengah"])? $_SESSION["nama-tengah"] : ""; ?>">
                        </div>
                        <div class="tanggal-lahir" style="margin-bottom: 1rem;">
                            <label for="tanggal-lahir" style="width:20%;margin-right: 2.7rem;">Tgl Lahir</label>
                            <input type="date" name="tanggal-lahir" id="tanggal-lahir" style="width:70%" required value="<?= isset($_SESSION["tanggal-lahir"])? $_SESSION["tanggal-lahir"] : ""; ?>">
                        </div>
                        <div class="email" style="margin-bottom: 1rem;">
                            <label for="email" style="width:20%;margin-right: 4.1rem;">Email</label>
                            <input type="email" name="email" id="email" style="width:70%" required value="<?= isset($_SESSION["email"])? $_SESSION["email"] : ""; ?>">
                        </div>
                        <div class="kode-pos" style="margin-bottom: 1rem;">
                            <label for="kode-pos" style="width:20%;margin-right: 2.6rem;">Kode Pos</label>
                            <input type="number" name="kode-pos" id="kode-pos" style="width:70%" required value="<?= isset($_SESSION["kode-pos"])? $_SESSION["kode-pos"] : ""; ?>">
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_pos']) ? $_SESSION['error_pos'] : '';?></p>
                        </div>
                        <div class="password-1">
                            <label for="password1" style="width:20%;margin-right: 1.9rem;">Password 1</label>
                            <input type="password" name="password1" id="password1" style="width:70%" required>
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_pass']) ? $_SESSION['error_pass'] : '';?></p>
                        </div>
                    </div>
                    <div class="regis-info">
                        <div class="nama-belakang" style="margin-bottom: 1rem;">
                            <label for="nama-belakang" style="width:20%;margin-right: 0rem;">Nama Belakang</label>
                            <input type="text" name="nama-belakang" id="nama-belakang" style="width:70%" required value="<?= isset($_SESSION["nama-belakang"])? $_SESSION["nama-belakang"] : ""; ?>">
                        </div>
                        <div class="nik" style="margin-bottom: 1rem;">
                            <label for="nik" style="width:20%;margin-right: 4.6rem;">NIK</label>
                            <input type="text" name="nik" id="nik" style="width:70%" required value="<?= isset($_SESSION["nik"])? $_SESSION["nik"] : ""; ?>">
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_nik']) ? $_SESSION['error_nik'] : '';?></p>
                        </div>
                        <div class="no-hp" style="margin-bottom: 1rem;">
                            <label for="no-hp" style="width:20%;margin-right: 3.6rem;">No HP</label>
                            <input type="text" name="no-hp" id="no-hp" style="width:70%" required placeholder="12 Digit Number" value="<?= isset($_SESSION["no-hp"])? $_SESSION["no-hp"] : ""; ?>">
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_telp']) ? $_SESSION['error_telp'] : '';?></p>
                        </div>
                        <div class="foto-profil" style="margin-bottom: 1rem;">
                            <label for="foto-profil" style="width:20%;margin-right: 2rem;">Foto Profil</label>
                            <input type="file" name="foto-profil" id="foto-profil" style="width:70%" required>
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_img']) ? $_SESSION['error_img'] : '';?></p>
                        </div>
                        <div class="password-2">
                            <label for="password2" style="width:20%;margin-right: 1.7rem;">Password 2</label>
                            <input type="password" name="password2" id="password2" style="width:70%" required>
                            <p style="color:red;text-align:center;margin-top: 5px;"><?= isset($_SESSION['error_pass']) ? $_SESSION['error_pass'] : '';?></p>
                        </div>
                    </div>
                </div>
                <div style="width: 60%;color:red;text-align:center">
                    <?= isset($_SESSION['error']) ? $_SESSION['error'] : '';?>
                </div>
                <div class="register-buttonpage">
                    <a href="welcome.php" class="kembali-register">Kembali</a>
                    <!-- <button class="kembali-register" onclick="window.history.go(-1)">Kembali</button> -->
                    <input type="submit" value="Register" name="register">
                </div>
            </form>
        </div>
    </div>
</body>
</html>