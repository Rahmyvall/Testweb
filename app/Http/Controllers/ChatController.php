<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Tampilkan halaman chat beserta pesan.
     */
    public function index(): \Illuminate\View\View
    {
        $messages = ChatMessage::with('user')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $title = 'Chat'; // Tambahkan variabel title
    
        return view('dashboard.admin.chat.index', compact('messages', 'title'));
    }
    

    /**
     * Kirim pesan user dan balasan bot.
     */
    public function sendMessage(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $user = Auth::user();

        // Simpan pesan user
        ChatMessage::create([
            'user_id' => $user->id,
            'message' => $request->message,
            'sender' => 'user',
        ]);

        // Generate jawaban bot
        $botReply = $this->getBotReply($request->message);

        // Simpan jawaban bot
        ChatMessage::create([
            'user_id' => $user->id,
            'message' => $botReply,
            'sender' => 'bot',
        ]);

        return redirect()->back();
    }

    /**
     * Logika balasan bot sederhana.
     */
    private function getBotReply(string $message): string
    {
        $message = strtolower($message);

        if (Str::contains($message, ['halo', 'hi'])) {
            return "Halo! Ada yang bisa saya bantu?";
        }

        if (Str::contains($message, ['harga', 'price'])) {
            return "Harga produk bisa Anda lihat di halaman Products.";
        }

        if (Str::contains($message, ['stock', 'stok'])) {
            return "Stok tersedia bisa dicek di halaman Stocks.";
        }

        if (Str::contains($message, ['purchase', 'order'])) {
            return "Informasi pembelian terbaru bisa dilihat di halaman Purchases.";
        }

        return "Maaf, saya belum mengerti. Bisa dijelaskan lebih detail?";
    }
}