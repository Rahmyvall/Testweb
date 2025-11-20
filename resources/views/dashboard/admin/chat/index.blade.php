@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Chatbot</h3>

        <div class="card" style="height: 500px; display: flex; flex-direction: column;">
            <div id="chat-box" class="card-body" style="overflow-y: auto; flex: 1; border-bottom: 1px solid #ddd;">
                <!-- Messages akan muncul di sini -->
            </div>
            <div class="card-footer">
                <form id="chat-form">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="message" id="message" class="form-control"
                            placeholder="Ketik pesan..." required>
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const chatForm = document.getElementById('chat-form');
        const chatBox = document.getElementById('chat-box');

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const messageInput = document.getElementById('message');
            const message = messageInput.value;

            if (!message.trim()) return;

            // Tampilkan pesan user
            const userMessage = document.createElement('div');
            userMessage.innerHTML = `<strong>You:</strong> ${message}`;
            chatBox.appendChild(userMessage);
            chatBox.scrollTop = chatBox.scrollHeight;

            // Kirim ke server
            fetch("{{ route('admin.chat.send') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(res => res.json())
                .then(data => {
                    const botMessage = document.createElement('div');
                    botMessage.innerHTML = `<strong>Bot:</strong> ${data.bot}`;
                    chatBox.appendChild(botMessage);
                    chatBox.scrollTop = chatBox.scrollHeight;
                })
                .catch(err => console.error('Error:', err));

            messageInput.value = '';
        });
    </script>
@endsection
