<!DOCTYPE html>
<html>
<head>
    <title>Test Menu</title>
</head>
<body>

<h2>Tambah Menu</h2>

<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Nama Menu">
    <br><br>

    <textarea name="description" placeholder="Deskripsi"></textarea>
    <br><br>

    <input type="number" name="price" placeholder="Harga">
    <br><br>

    <label>Gambar Menu</label>

    <input
        type="file"
        name="image"
        class="form-control"
        accept="image/*">

    <br><br>

<label>Status</label>

<select name="status">
    <option value="Aktif">Aktif</option>
    <option value="Nonaktif">Nonaktif</option>
</select>

<br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>