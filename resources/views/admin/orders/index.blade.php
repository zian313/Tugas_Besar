@extends('layout')

@section('title', 'Kelola Pesanan')

@section('content')
<div style="padding-top: 100px; padding-bottom: 3rem;">
  <div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
      <h1 style="font-size: 2rem; font-weight: 700; color: #000;">📦 Kelola Pesanan</h1>
    </div>

    @if (session('success'))
      <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 0.3rem; margin-bottom: 1.5rem;">
        {{ session('success') }}
      </div>
    @endif

    <div style="background: white; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
      <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
          <thead style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef;">
            <tr>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">ID</th>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">Tanggal</th>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">Pelanggan</th>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">Total</th>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">Status</th>
              <th style="padding: 1rem; text-align: left; font-weight: 600; color: #495057;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $order)
              <tr style="border-bottom: 1px solid #e9ecef;">
                <td style="padding: 1rem;">#{{ $order->id }}</td>
                <td style="padding: 1rem; color: #666;">{{ $order->created_at->format('d M Y H:i') }}</td>
                <td style="padding: 1rem;">
                  <div style="font-weight: 600;">{{ $order->user->name }}</div>
                  <div style="font-size: 0.85rem; color: #666;">{{ $order->phone }}</div>
                </td>
                <td style="padding: 1rem; font-weight: 600; color: #1e09e2;">
                  Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </td>
                <td style="padding: 1rem;">
                  @php
                    $colors = [
                      'pending' => '#ffc107',
                      'paid' => '#17a2b8', 
                      'shipped' => '#007bff',
                      'completed' => '#28a745',
                      'cancelled' => '#dc3545'
                    ];
                    $color = $colors[$order->status] ?? '#6c757d';
                  @endphp
                  <span style="background-color: {{ $color }}; color: white; padding: 0.25rem 0.6rem; border-radius: 0.3rem; font-size: 0.85rem; text-transform: capitalize;">
                    {{ $order->status }}
                  </span>
                </td>
                <td style="padding: 1rem;">
                  <form action="{{ route('orders.update', $order) }}" method="POST" style="display: inline-flex; gap: 0.5rem; align-items: center;">
                    @csrf
                    @method('PUT')
                    
                    <select name="status" style="padding: 0.3rem; border-radius: 0.3rem; border: 1px solid #ced4da; font-size: 0.9rem;" onchange="this.form.submit()">
                      <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Sudah Bayar</option>
                      <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                      <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                      <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
                    </select>

                    <button type="button" onclick="alert('Detail pesanan:\n\n{{ $order->shipping_address }}')" style="background: none; border: none; cursor: pointer; color: #6c757d;" title="Lihat Alamat">
                      <i data-feather="map-pin" style="width: 16px; height: 16px;"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" style="padding: 2rem; text-align: center; color: #999;">Belum ada pesanan masuk.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      
      <div style="padding: 1rem;">
        {{ $orders->links() }}
      </div>
    </div>

  </div>
</div>

<script>
  feather.replace();
</script>
@endsection
