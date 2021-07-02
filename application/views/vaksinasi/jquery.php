<script src="<?= base_url('assets/') ?>dist/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nik_psn").focus().select();

        $(document).on('click', '#btnsimpan', function() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>vaksinasi/proses",
                dataType: "text",
                data: $("#frmtbh").serialize(),
                cache: false,
                success: function(result) {
                    if (result.success == true) {
                        alert('Data Gagal Disimpan')
                    } else {
                        alert('Data Berhasil Ditambahkan')
                    }
                    location.href = '<?= site_url('vaksinasi/tambah') ?>'
                }
            })
        })

        $(document).on('change', '#nik_psn', function() {
            var nik_psn = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>vaksinasi/cari_pasien",
                dataType: "text",
                data: {
                    nik_psn: nik_psn
                },
                cache: false,
                success: function(data) {
                    var header = data.split("\t");
                    $("[name=nama_psn]").val(header[0]);
                }
            });
        })
    })
</script>