<script>
    $(document).ready(function() {
        <?php
        if ($page == "siswa") :
        ?>
            $("#button_tambah").attr('onclick', 'tambahData("model/siswaModel.php")');

            var table = $('#table').DataTable({
                responsive: true,
                processing: true,
                ServerSide: true,
                retrieve: true,
                ajax: {
                    url: 'model/siswaModel.php',
                    type: 'POST',
                    data: {
                        'action': 'getAll'
                    },
                    "dataSrc": "",
                },
                columns: [{
                        "data": "nis"
                    },
                    {
                        "data": "nama_siswa"
                    },
                    {
                        "data": "tempat_lahir"
                    },
                    {
                        "data": "tanggal_lahir"
                    },
                    {
                        "data": "jurusan"
                    },
                    {
                        "data": "alamat"
                    },
                    {
                        "data": "no_telp"
                    },
                ],
                columnDefs: [{
                    targets: 7,
                    render: function(data, type, row, meta) {
                        return '\
                    <button class="btn btn-warning text-white btn-sm" onclick="showEditPasien(\'' + row.id + '\',\'' + row.nis + '\', \'' + row.nama_pasien + '\', \'' + row.nama_siswa + '\', \'' + row.tempat_lahir + '\', \'' + row.tanggal_lahir + '\',  \'' + row.jurusan + '\', \'' + row.alamat + '\', \'' + row.no_telp + '\');"><i class="fas fa-edit"></i></button> | \
                    <button class="btn btn-danger text-white btn-sm" onclick="deletePasien(' + row.id + ')"><i class="fas fa-trash"></i></button>';
                    }
                }]
            });
        <?php
        elseif ($page == "pemasukan") :
        ?>
            $("#button_tambah").attr('onclick', 'tambahData("model/pemasukanbModel.php")');

            var table = $('#table').DataTable({
                responsive: true,
                processing: true,
                ServerSide: true,
                retrieve: true,
                ajax: {
                    url: 'model/jadwalDokterModel.php',
                    type: 'POST',
                    data: {
                        'action': 'getAll'
                    },
                    "dataSrc": "",
                },
                columns: [{
                        "data": "nama_lengkap"
                    },
                    {

                        "data": "hari"
                    },
                    {
                        "data": "jam_mulai"
                    },
                    {
                        "data": "jam_selesai"
                    },
                    {
                        "data": "poliklinik"
                    },

                ],
                columnDefs: [{
                    targets: 5,
                    render: function(data, type, row, meta) {
                        return '\
                        <button class="btn btn-warning text-white btn-sm" onclick="showEditjadwalDokter(\'' + row.id + '\',\'' + row.hari + '\', \'' + row.jam_mulai + '\', \'' + row.jam_selesai + '\',  \'' + row.id_dokter + '\',);"><i class="fas fa-edit"></i></button> | \
                        <button class="btn btn-danger text-white btn-sm" onclick="deletejadwalDokter(' + row.id + ')"><i class="fas fa-trash"></i></button>';
                    }
                }]
            });
        <?php
        elseif ($page == "pengeluaran") :
        ?>
            $("#button_tambah").attr('onclick', 'tambahData("model/obatModel.php")');

            var table = $('#table').DataTable({
                responsive: true,
                processing: true,
                ServerSide: true,
                retrieve: true,
                ajax: {
                    url: 'model/obatModel.php',
                    type: 'POST',
                    data: {
                        'action': 'getAll'
                    },
                    "dataSrc": "",
                },
                columns: [{
                        "data": "nama_obat"
                    },
                    {
                        "data": "keterangan"
                    },
                ],
                columnDefs: [{
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return '\
                    <button class="btn btn-warning text-white btn-sm" onclick="showEditObat(\'' + row.id + '\',\'' + row.nama_obat + '\', \'' + row.keterangan + '\');"><i class="fas fa-edit"></i></button> | \
                    <button class="btn btn-danger text-white btn-sm" onclick="deleteObat(' + row.id + ')"><i class="fas fa-trash"></i></button>';
                    }
                }]
            });
        <?php
        elseif ($page == "setor-spp") :
        ?>
            $("#button_tambah").attr('onclick', 'tambahData("model/dokterModel.php")');

            var table = $('#table').DataTable({
                responsive: true,
                processing: true,
                ServerSide: true,
                retrieve: true,
                ajax: {
                    url: 'model/dokterModel.php',
                    type: 'POST',
                    data: {
                        'action': 'getAll'
                    },
                    "dataSrc": "",
                },
                columns: [{
                        "data": "nama_lengkap"
                    },
                    {
                        "data": "jenis_kelamin"
                    },
                    {
                        "data": "no_telp"
                    },
                    {
                        "data": "alamat"
                    },
                    {
                        "data": "poliklinik"
                    },
                ],
                columnDefs: [{
                    targets: 5,
                    render: function(data, type, row, meta) {
                        return '\
                <button class="btn btn-warning text-white btn-sm" onclick="showEditDokter(\'' + row.id + '\',\'' + row.nama_lengkap + '\', \'' + row.jenis_kelamin + '\', \'' + row.no_telp + '\', \'' + row.alamat + '\',  \'' + row.poliklinik + '\');"><i class="fas fa-edit"></i></button> | \
                <button class="btn btn-danger text-white btn-sm" onclick="deleteDokter(' + row.id + ')"><i class="fas fa-trash"></i></button>';
                    }
                }]
            });
        <?php
        elseif ($page == "transaksi") :
        ?>
        $("#button_tambah").attr('onclick', 'tambahData("model/transaksiModel.php")');

            var table = $('#table').DataTable({
                responsive: true,
                processing: true,
                ServerSide: true,
                retrieve: true,
                ajax: {
                    url: 'model/transaksiModel.php',
                    type: 'POST',
                    data: {
                        'action': 'getAll'
                    },
                    "dataSrc": "",
                },
                columns: [{
                        "data": "kategori"
                    },
                    {

                        "data": "jumlah",
                        "render": $.fn.dataTable.render.number( ',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "keterangan"
                    },
                ],
                columnDefs: [{
                    targets: 3,
                    render: function(data, type, row, meta) {
                        return '\
                        <button class="btn btn-warning text-white btn-sm" onclick="showEditTransaksi(\'' + row.id + '\',\'' + row.kategori + '\', \'' + row.jumlah + '\', \'' + row.keterangan + '\');"><i class="fas fa-edit"></i></button> | \
                        <button class="btn btn-danger text-white btn-sm" onclick="deleteTransaksi(' + row.id + ')"><i class="fas fa-trash"></i></button>';
                    }
                }]
            });
        <?php endif; ?>
        <?php if (
            ($page == "siswa") ||
            ($page == "pemasukan") ||
            ($page == "pengeluaran") ||
            ($page == "setor-spp")
        ) : ?>
            setInterval(function() {
                // user paging is not reset on reload
                table.ajax.reload(null, false);
            }, 2000); // 2 secs
        <?php endif; ?>
    });
</script>