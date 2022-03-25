<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>
    <div class="profile-container">
        <div class="home-header">
            <div class="home-nav-title">
                <p>Aplikasi Pengelolaan keuangaan</p>
            </div>
            <div class="profile-nav-menu">
                <div class="home-home">
                    <a href="home.php" style="text-decoration: none;color: #000">Home</a>
                </div>
                <div class="home-profile">
                    <a href="profile.php" style="color: #000">Profile</a>
                </div>
            </div>
            <div class="profile-nav-logout">
                <a href="logout.php" style="text-decoration: none;color: #000">Logout</a>
            </div>
        </div>
        <div class="profile-content">
            <div class="info">
                <div class="regis-info">
                    <div class="nama-depan" style="margin-bottom: 1rem;width:100%; display: flex;">
                        <label for="nama-depan" style="width:30%;margin-right: -0.5rem;">Nama Depan</label>
                        <div class="word-wrap">
                            <strong><?=$_SESSION["nama-depan"]?></strong>
                        </div>
                    </div>
                    <div class="tempat-lahir" style="margin-bottom: 1rem; display: flex;">
                        <label for="tempat-lahir" style="width:30%;margin-right: -0.5rem;">Tempat Lahir</label>
                        <div class="word-wrap">
                            <span style="width:70%"><strong><?=$_SESSION["tempat-lahir"]?></strong></span>
                        </div>
                    </div>
                    <div class="warga-negara" style="margin-bottom: 1rem; display: flex">
                        <label for="warga-negara" style="width:30%;margin-right: -0.5rem;">Warga Negara</label>
                        <div class="word-wrap">
                            <span style="width:70%"><strong><?=$_SESSION["warga-negara"]?></strong></span>
                        </div>
                    </div>
                    <div class="alamat" style="margin-bottom: 1rem;display: flex">
                        <label for="alamat" style="width:20%;margin-right: 1.9rem;">Alamat</label>
                        <div class="word-wrap">
                            <strong><?=$_SESSION["alamat"]?></strong>
                        </div>
                    </div>
                    <div class="username">
                        <label for="username" style="width:20%;margin-right: 2.4rem;">Username</label>
                        <span style="width:70%"><strong><?=$_SESSION["username"]?></strong></span>
                    </div>
                </div>
                <div class="regis-info">
                    <div class="nama-tengah" style="margin-bottom: 1rem; display: flex;">
                        <label for="nama-tengah" style="width:30%;margin-right: -0.4rem;">Nama Tengah</label>
                        <div class="word-wrap">
                            <span style="width:70%"><strong><?=$_SESSION["nama-tengah"]?></strong></span>
                        </div>
                    </div>
                    <div class="tanggal-lahir" style="margin-bottom: 1rem;">
                        <label for="tanggal-lahir" style="width:20%;margin-right: 2.7rem;">Tgl Lahir</label>
                        <span style="width:70%"><strong><?=$_SESSION["tanggal-lahir"]?></strong></span>
                    </div>
                    <div class="email" style="margin-bottom: 1rem;">
                        <label for="email" style="width:20%;margin-right: 4.1rem;">Email</label>
                        <span style="width:70%"><strong><?=$_SESSION["email"]?></strong></span>
                    </div>
                    <div class="kode-pos" style="margin-bottom: 1rem;">
                        <label for="kode-pos" style="width:20%;margin-right: 2.6rem;">Kode Pos</label>
                        <span style="width:70%"><strong><?=$_SESSION["kode-pos"]?></strong></span>
                    </div>
                    <div class="password-1">
                        <label for="password1" style="width:20%;margin-right: 1.9rem;">Password 1</label>
                        <span style="width:70%"><strong><?=$_SESSION["password1"]?></strong></span>
                    </div>
                </div>
                <div class="regis-info">
                    <div class="nama-belakang" style="margin-bottom: 1rem; display: flex;">
                        <label for="nama-belakang" style="width:30%;margin-right: 0.4rem;">Nama Belakang</label>
                        <div class="word-wrap">
                            <span style="width:70%"><strong><?=$_SESSION["nama-belakang"]?></strong></span>
                        </div>
                    </div>
                    <div class="nik" style="margin-bottom: 1rem;">
                        <label for="nik" style="width:20%;margin-right: 5.6rem;">NIK</label>
                        <span style="width:70%"><strong><?=$_SESSION["nik"]?></strong></span>
                    </div>
                    <div class="no-hp" style="margin-bottom: 1rem;">
                        <label for="no-hp" style="width:20%;margin-right: 4.6rem;">No HP</label>
                        <span style="width:70%"><strong><?=$_SESSION["no-hp"]?></strong></span>
                    </div>
                    <div class="foto-profil" style="margin-bottom: 1rem;display: flex;">
                        <label for="foto-profil" style="width:20%;margin-right: 3rem;">Foto Profil</label>
                        <span style="width:70%">
                            <img src="./Image/<?=$_SESSION["foto-profil"] ?>" alt="" style="width: 100%;height: 100%;vertical-align: middle; background-repeat: no-repeat; background-position: center;background-size: cover;">
                    </span>
                    </div>
                    <div class="password-2">
                        <label for="password2" style="width:20%;margin-right: 2.7rem;">Password 2</label>
                        <span style="width:70%"><strong><?=$_SESSION["password2"]?></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>