<?php

require_once "../db/conn.php";
require_once "../db/func.php";

if (isset($_POST["action"])) {
    $action = $_POST["action"];

    if ($action == "getAll") {
        $no = 1;
        $data = getData("tb_user");
        echo json_encode($data);
    }

    // if ($action == "getById") {
    // }

    if ($action == "insertData") {
        unset($_POST["id"]);
        $nis        = $_POST["nis"];
        $nama_siswa  = $_POST["nama_siswa"];
        $tempat_lahir      = $_POST["tempat_lahir"];
        $tgl_lahir  = $_POST["tanggal_lahir"];
        $jurusan    = $_POST["jurusan"];
        $alamat   = $_POST["alamat"];
        $no_telp = $_POST["no_telp"];

        $data = [
            "nis"          => $nis,
            "nama_siswa"   => $nama_siswa,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir"    => $tgl_lahir,
            "jurusan"      => $jurusan,
            "alamat"       => $alamat,
            "no_telp"      => $no_telp,
        ];

        if (insertData("tb_siswa", $data) == 1) {
            echo json_encode([
                "status" => true,
                "message" => "Berhasil Menambahkan Data"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Gagal Menambahkan Data",
            ]);
        }
    }

    if ($action == "updateData") {
        $id = $_POST["id"];
        $nis        = $_POST["nis"];
        $nama_siswa  = $_POST["nama_siswa"];
        $tempat_lahir      = $_POST["tempat_lahir"];
        $tgl_lahir  = $_POST["tanggal_lahir"];
        $jurusan    = $_POST["jurusan"];
        $alamat   = $_POST["alamat"];
        $no_telp = $_POST["no_telp"];

        $data = [
            "nis"          => $nis,
            "nama_siswa"   => $nama_siswa,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir"    => $tgl_lahir,
            "jurusan"      => $jurusan,
            "alamat"       => $alamat,
            "no_telp"      => $no_telp,
        ];

        if (updateData("tb_siswa", $id, $data) == 1) {
            echo json_encode([
                "status" => true,
                "message" => "Berhasil Mengubah Data"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Gagal Mengubah Data"
            ]);
        }
    }

    if ($action == "deleteData") {
        $id = $_POST["id"];
        if (deleteData("tb_siswa", $id) == 1) {
            echo json_encode([
                "status" => true,
                "message" => "Berhasil Menghapus Data"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Gagal Menghapus Data"
            ]);
        }
    }

    $conn->close();
}
