<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>

<h1>Keranjang Belanja</h1>

@php
    $total = 0;
@endphp

@if(count($cart) == 0)

    <h3>Keranjang masih kosong.</h3>

@else

    @foreach($cart as $item)

    @php
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
    @endphp

        <div style="margin-bottom:20px;border-bottom:1px solid #ddd;padding-bottom:15px;">

    <h3>{{ $item['name'] }}</h3>

    <p>
    Harga :
    Rp {{ number_format($item['price'],0,',','.') }}
</p>

<p>
    Subtotal :
    <strong>
        Rp {{ number_format($subtotal,0,',','.') }}
    </strong>
</p>

    <div style="display:flex;gap:10px;align-items:center;">

        <form action="{{ route('cart.decrease',$item['id']) }}" method="POST">
            @csrf
            @method('PATCH')

            <button>-</button>

        </form>

        <strong>{{ $item['qty'] }}</strong>

        <form action="{{ route('cart.increase',$item['id']) }}" method="POST">
            @csrf
            @method('PATCH')

            <button>+</button>

        </form>

        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit"
            style="background:red;color:white;padding:5px 10px;border:none;border-radius:5px;cursor:pointer;">
        🗑 Hapus
    </button>

</form>

    </div>

</div>

    @endforeach

    <hr>

<h2>
    Total :
    Rp {{ number_format($total,0,',','.') }}
</h2>

<form action="{{ route('cart.checkout') }}" method="POST">

    @csrf

    <br><br>

    <h2>Data Pemesan</h2>

    <div style="margin-bottom:15px;">
        <label>Nama</label><br>
        <input type="text"
               name="customer_name"
               placeholder="Masukkan nama"
               style="width:100%;padding:10px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>No WhatsApp</label><br>
        <input type="text"
               name="phone"
               placeholder="08xxxxxxxxxx"
               style="width:100%;padding:10px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Alamat</label><br>
        <textarea name="address"
                  rows="3"
                  style="width:100%;padding:10px;"></textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Catatan</label><br>
        <textarea name="note"
                  rows="3"
                  placeholder="Contoh: sambal dipisah"
                  style="width:100%;padding:10px;"></textarea>
    </div>

    <button type="submit">

        Buat Pesanan

    </button>

</form>

@endif

</body>
</html>