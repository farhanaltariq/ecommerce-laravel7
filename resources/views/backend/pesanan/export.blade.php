{{-- @extends('partials.head') --}}

<center>
    <h4>Laporan Pesanan</h4>
    <span style="float: right; margin: 20px auto">
        Data ini digenerate pada tanggal {{ date('d-m-Y') }}
    </span> <br>
    <table style="margin: 50px auto">
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $item)
            {{-- {{ dd($item->pelanggan) }} --}}
            <tr>
                <td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">
                    {{ $item->invoice_id }}
                </td>
                <td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">
                    {{ $item->pelanggan->name }}
                </td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">
                <td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">Rp. {{ number_format($item->total_harga, 2) }}</td>
                <td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">
                    {{ $item->status }}
                </td>
                <td style="margin: 5px 10px 5px 10px; border-bottom: 1px solid black">
                    {{ $item->date }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</center>