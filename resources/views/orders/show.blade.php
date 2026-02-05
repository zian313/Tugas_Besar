@extends('layout')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div style="padding-top: 100px; padding-bottom: 3rem;">
  <div style="max-width: 800px; margin: 0 auto; padding: 0 1rem;">
    
    <div style="margin-bottom: 2rem;">
      <a href="{{ route('orders.index') }}" style="color: #666; text-decoration: none; font-weight: 500;">
        ← Kembali ke Pesanan Saya
      </a>
    </div>

    <div style="background: white; border-radius: 0.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); padding: 2rem; position: relative; overflow: hidden;">
      
      <!-- Status Ribbon -->
      <div style="position: absolute; top: 0; right: 0; background: #1e09e2; color: white; padding: 0.5rem 1.5rem; border-bottom-left-radius: 0.5rem; font-weight: 700; font-size: 0.9rem;">
        {{ ucfirst($order->status) }}
      </div>

      <h1 style="font-size: 1.8rem; font-weight: 700; color: #000; margin-bottom: 0.5rem;">Pesanan #{{ $order->id }}</h1>
      <p style="color: #666; font-size: 0.95rem; margin-bottom: 2rem;">
        Dibuat pada {{ $order->created_at->format('d F Y, H:i') }}
      </p>

      <div style="border-top: 2px solid #f0f0f0; border-bottom: 2px solid #f0f0f0; padding: 1.5rem 0; margin-bottom: 2rem;">
        <h3 style="font-size: 1.1rem; font-weight: 700; color: #000; margin-bottom: 1rem;">Rincian Pengiriman</h3>
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem;">
          <div style="color: #666;">Nama Penerima</div>
          <div style="font-weight: 600; color: #000;">{{ $order->user->name }}</div>
          
          <div style="color: #666;">No. Telepon</div>
          <div style="font-weight: 600; color: #000;">{{ $order->phone }}</div>
          
          <div style="color: #666;">Alamat</div>
          <div style="font-weight: 600; color: #000;">{{ $order->shipping_address }}</div>
        </div>
      </div>

      <h3 style="font-size: 1.1rem; font-weight: 700; color: #000; margin-bottom: 1rem;">Produk yang Dibeli</h3>
      <div style="margin-bottom: 2rem;">
        @foreach ($order->items as $item)
          <div style="display: flex; gap: 1rem; padding: 1rem 0; border-bottom: 1px solid #eee;">
            <!-- Image -->
            <div style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 0.3rem; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
              @if($item->product && $item->product->image)
                 <img src="{{ asset('storage/' . $item->product->image) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.3rem;">
              @else
                 <i data-feather="package" style="color: #ccc;"></i>
              @endif
            </div>

            <div style="flex-grow: 1;">
              <h4 style="margin: 0 0 0.3rem 0; font-size: 1rem; color: #000;">{{ $item->product->name ?? 'Produk Dihapus' }}</h4>
              <p style="margin: 0; color: #666; font-size: 0.9rem;">
                {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
              </p>
            </div>

            <div style="text-align: right; font-weight: 600; color: #000;">
              Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
            </div>
          </div>
        @endforeach
      </div>

      <div style="text-align: right;">
        <p style="margin: 0; color: #666; font-size: 1rem;">Total Pembayaran</p>
        <p style="margin: 0; color: #1e09e2; font-size: 2rem; font-weight: 700;">
          Rp {{ number_format($order->total_price, 0, ',', '.') }}
        </p>
      </div>

      <div style="margin-top: 2rem; text-align: center;">
        <button onclick="window.print()" style="background-color: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 0.6rem 1.5rem; border-radius: 0.3rem; cursor: pointer; font-weight: 600; transition: 0.3s;" onmouseover="this.style.backgroundColor='#e2e6ea'" onmouseout="this.style.backgroundColor='#f8f9fa'">
          🖨️ Cetak Invoice
        </button>
      </div>

    </div>
  </div>
</div>

<script>
  feather.replace();
</script>
@endsection
