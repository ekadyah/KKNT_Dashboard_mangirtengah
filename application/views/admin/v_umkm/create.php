<form 
cass="" 
enctype="multipart/form-data"
action="<?php echo site_url('Umkm/save') ?>" 
method="post">

    <label>Nama Usaha</label><br>
    <input type="text" name="nama_perusahaan" value="">
    <p>
    </p>

    <label>Pemilik</label><br>
    <input type="text" name="pemilik" value="">
    <p>
    </p>

    <label>Alamat</label><br>
    <input type="text" name="alamat" value="">
    <p>
    </p>

    <label>Foto</label><br>
    <input type="file" name="foto_umkm" id="foto_umkm" value="">
    <p>
    </p>

    <label>Keterangan</label><br>
    <input type="text" name="keterangan" value="">
    <p>
    </p>
    <button type="submit" name="button">Simpan</button>
    <a href="<?php echo site_url('Umkm') ?>">
        <button 
            type="button" 
            name="button">Batal
        </button>
    </a>

</form>