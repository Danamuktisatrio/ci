<div class = "container-fluid">
    <div class = "row justify-content-md-left">
        <div class = "col-md-6">
            <br>
            <div class = "card" style = "width:200%;">
            <div class = "card-body">
                <h5 class = "card-title text-center">Pilih Kecamatan</h5>
                <form>             
                    <form method="post">
                    <div class="input-group mb-3 ml-4 col-md-6 ">
                    <input type="text" class="form-control" placeholder="Search Kec" name="keyword" 
                    autocomplete="off" autofocus>
                    <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                    
</form>              

               </form>
                    <div class="container">
                <div class = "form-group ">
              <label for="exampleFromControlSelect">Kecamatan</label>
            <select class="form-control" id="kecamatan" name="kecamatan">
            <option selected="0">Pilih Kecamatan</option>
            <?php foreach($datakab as $kec) : ?>
                <option value="<?php echo $kec->id_kec;?>"> <?php echo $kec->Nama_Kec; ?></option>
            <?php endforeach; ?>
            </select>
            </div>
                                <div class = "form-group">
                                <label for="exampleFromControlSelect">Desa</label>
                                <select class="form-control" id="desa" name="desa">
                                <option selected="0">Pilih Desa</option>                                
                                </select>
                                 <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
                                
  
                                <script>
                                $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
                                    // Kita sembunyikan dulu untuk loadingnya
                                    $("#loading").hide();
                                    
                                    $("#kecamatan").change(function(){ // Ketika user mengganti atau memilih data provinsi
                                    $("#desa").val().hide(); // Sembunyikan dulu combobox kota nya
                                    $("#loading").show(); // Tampilkan loadingnya
                                    
                                    $.ajax({
                                        type: "POST", // Method pengiriman data bisa dengan GET atau POST
                                        url: "<?php echo base_url("PerangkatDesa.php/datakab/listDesa"); ?>", // Isi dengan url/path file php yang dituju
                                        data: {id_kec : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
                                        dataType: "json",
                                        beforeSend: function(e) {
                                        if(e && e.overrideMimeType) {
                                            e.overrideMimeType("application/json;charset=UTF-8");
                                        }
                                        },
                                        success: function(response){ // Ketika proses pengiriman berhasil
                                        $("#loading").hide(); // Sembunyikan loadingnya
                                        // set isi dari combobox kota
                                        // lalu munculkan kembali combobox kotanya
                                        $("#desa").html(response.list_desa).show();
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                                        }
                                    });
                                    });
                                });
                                </script>
                                
                                
                            </div>
                </form>

            </div>
            </div>

        </div>

    </div>
</div>