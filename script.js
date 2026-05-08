function validasiForm(isEdit) {
  var nama = document.getElementById("nama_produk").value.trim();
  var harga = document.getElementById("harga").value.trim();
  var stok = document.getElementById("stok").value.trim();
  var foto = document.getElementById("foto").files[0];

  if (nama === "" || harga === "" || stok === "") {
    alert("Semua field teks/angka harus diisi!");
    return false;
  }

  if (!isEdit && !foto) {
    alert("Foto wajib diunggah untuk produk baru!");
    return false;
  }

  if (foto) {
    var ukuran = foto.size;
    var tipe = foto.type;
    var validTypes = ["image/jpeg", "image/png", "image/jpg"];

    if (!validTypes.includes(tipe)) {
      alert("Format file tidak valid. Harap unggah jpg/jpeg/png.");
      return false;
    }
    if (ukuran > 2 * 1024 * 1024) {
      alert("Ukuran file foto tidak boleh lebih dari 2MB!");
      return false;
    }
  }
  return true;
}
