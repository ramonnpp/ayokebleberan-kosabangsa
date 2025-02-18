<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - SimpanGaleri</title>
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/ayokebleberan.png">
    <link rel="stylesheet" href="css/form_galeri.css">
    <style>
    </style>
</head>

<body>
    <section class="section intro">
        <p align="center" style="color: black; font-size:larger; text-align:center;" class="fadeIn first">Tambah Foto</p>
        <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
            <table cellpadding="10" align="center">
                <tr class="fadeIn second">
                    <td class="fadeIn second">Nama Tempat</td>
                    <td>
                        <input type="text" class="fadeIn second" name="nama_tempat" placeholder="Nama Tempat" required class="form-control" />
                    </td>
                </tr>
                <tr class="fadeIn third">
                    <td class="fadeIn third">
                        <label for="">Foto</label>
                    </td>
                    <td class="fadeIn third">
                        <div class="form-group">
                            <div class="custom-file-input" id="drop-zone">
                                <div class="drop-zone-content">
                                    <i class="fa fa-cloud-upload"></i>
                                    <span>Tarik dan letakkan file foto di sini atau klik untuk memilih</span>
                                    <input type="file" id="foto" name="foto" class="file-input" accept="image/*" required>
                                </div>
                                <div class="file-name" id="file-name"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="fadeIn fourth">
                    <td class="fadeIn fourth"><input type="submit" value="Simpan"></td>
                    <td class="fadeIn fourth"><a href="galeri.php"><input type="button" value="Batal"></a></td>
                </tr>
            </table>
        </form>
    </section>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('foto');
        const fileName = document.getElementById('file-name');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        dropZone.addEventListener('drop', handleDrop, false);
        fileInput.addEventListener('change', handleFiles, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropZone.classList.add('drag-over');
        }

        function unhighlight(e) {
            dropZone.classList.remove('drag-over');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length) {
                fileInput.files = files;
                handleFiles();
            }
        }

        function handleFiles() {
            const file = fileInput.files[0];
            if (file) {
                fileName.textContent = 'File yang dipilih: ' + file.name;
            }
        }
    });
</script>

</html>