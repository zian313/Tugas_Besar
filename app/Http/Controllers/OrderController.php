<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Tampilkan daftar semua order (Admin)
    public function index()
    {
        // Ambil order terbaru dulu, load user dan items
        $orders = Order::with(['user', 'items.product'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Tampilkan detail order (Admin)
    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    // Update status order (Admin)
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui');
    }
    
    // User: Tampilkan pesanan saya
    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
                    ->with(['items.product'])
                    ->latest()
                    ->paginate(10);
                    
        return view('orders.index', compact('orders'));
    }

    // User: Tampilkan detail pesanan saya
    public function myOrderShow(Order $order)
    {
        // Pastikan order milik user yang sedang login
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load(['items.product']);
        return view('orders.show', compact('order'));
    }
}
