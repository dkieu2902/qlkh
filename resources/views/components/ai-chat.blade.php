<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    .ai-chat-button {
        position: fixed;
        right: 24px;
        bottom: 24px;
        width: 70px;
        height: 70px;
        border-radius: 24px;
        background: linear-gradient(135deg, #f97316, #ef4444, #7c2d12);
        border: none;
        cursor: pointer;
        box-shadow: 0 22px 45px rgba(239, 68, 68, 0.35);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.25s ease;
        overflow: hidden;
        padding: 6px;
    }

    .ai-chat-button:hover {
        transform: translateY(-4px) scale(1.04);
    }

    .ai-chat-button img {
        width: 100%;
        height: 100%;
        border-radius: 20px;
        object-fit: cover;
    }

    .ai-chat-box {
        position: fixed;
        right: 24px;
        bottom: 108px;
        width: 420px;
        height: 600px;
        background: rgba(255,255,255,0.97);
        backdrop-filter: blur(18px);
        border-radius: 32px;
        overflow: hidden;
        display: none;
        flex-direction: column;
        z-index: 99999;
        border: 1px solid rgba(226,232,240,0.95);
        box-shadow: 0 34px 90px rgba(15,23,42,0.28);
    }

    .ai-chat-header {
        background:
            radial-gradient(circle at top left, rgba(255,255,255,0.26), transparent 35%),
            linear-gradient(135deg, #f97316, #ef4444 55%, #7c2d12);
        padding: 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
    }

    .ai-chat-header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .ai-header-avatar {
        width: 58px;
        height: 58px;
        border-radius: 20px;
        overflow: hidden;
        border: 2px solid rgba(255,255,255,0.28);
        background: rgba(255,255,255,0.16);
        flex-shrink: 0;
        box-shadow: 0 12px 26px rgba(15,23,42,0.16);
    }

    .ai-header-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ai-chat-info h2 {
        font-size: 17px;
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .ai-chat-info p {
        font-size: 12px;
        opacity: 0.9;
        font-weight: 600;
    }

    .ai-chat-close {
        width: 38px;
        height: 38px;
        border-radius: 14px;
        border: none;
        background: rgba(255,255,255,0.16);
        color: white;
        font-size: 24px;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .ai-chat-close:hover {
        background: rgba(255,255,255,0.28);
        transform: rotate(90deg);
    }

    .ai-chat-messages {
        flex: 1;
        padding: 18px;
        overflow-y: auto;
        background:
            radial-gradient(circle at top right, rgba(249,115,22,0.12), transparent 30%),
            radial-gradient(circle at bottom left, rgba(239,68,68,0.09), transparent 34%),
            #f8fafc;
    }

    .ai-chat-messages::-webkit-scrollbar {
        width: 6px;
    }

    .ai-chat-messages::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 999px;
    }

    .message-row {
        display: flex;
        align-items: flex-end;
        gap: 9px;
        margin-bottom: 15px;
    }

    .message-row.ai {
        justify-content: flex-start;
    }

    .message-row.user {
        justify-content: flex-end;
    }

    .message-avatar {
        width: 38px;
        height: 38px;
        border-radius: 14px;
        overflow: hidden;
        flex: 0 0 38px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 18px rgba(15,23,42,0.09);
    }

    .message-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-letter-avatar {
        width: 38px;
        height: 38px;
        border-radius: 14px;
        flex: 0 0 38px;
        background: linear-gradient(135deg, #0f172a, #334155);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 900;
        box-shadow: 0 8px 18px rgba(15,23,42,0.14);
    }

    .message {
        max-width: 74%;
        padding: 13px 15px;
        border-radius: 21px;
        font-size: 14px;
        line-height: 1.6;
        white-space: pre-wrap;
        word-break: break-word;
    }

    .message.ai {
        background: #ffffff;
        color: #0f172a;
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: 7px;
        box-shadow: 0 10px 24px rgba(15,23,42,0.06);
    }

    .message.user {
        background: linear-gradient(135deg, #ef4444, #f97316);
        color: white;
        border-bottom-right-radius: 7px;
        box-shadow: 0 12px 24px rgba(239,68,68,0.22);
    }

    .ai-chat-form {
        padding: 14px;
        border-top: 1px solid #e5e7eb;
        background: white;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ai-chat-input {
        flex: 1;
        height: 48px;
        border-radius: 17px;
        border: 1px solid #dbe3ef;
        background: #f8fafc;
        padding: 0 16px;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
    }

    .ai-chat-input:focus {
        background: white;
        border-color: #f97316;
        box-shadow: 0 0 0 4px rgba(249,115,22,0.14);
    }

    .ai-chat-send {
        width: 48px;
        height: 48px;
        border: none;
        border-radius: 17px;
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        cursor: pointer;
        flex-shrink: 0;
        transition: 0.25s ease;
        font-size: 20px;
    }

    .ai-chat-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 26px rgba(239,68,68,0.28);
    }

    @media (max-width: 480px) {
        .ai-chat-box {
            width: calc(100% - 20px);
            right: 10px;
            bottom: 92px;
            height: 72vh;
            border-radius: 26px;
        }

        .ai-chat-button {
            right: 14px;
            bottom: 14px;
            width: 62px;
            height: 62px;
            border-radius: 22px;
        }

        .message {
            max-width: 72%;
        }
    }
</style>

<button class="ai-chat-button" onclick="toggleAIChat()" type="button">
    <img src="{{ asset('images/cat-ai.png') }}" alt="Cat AI">
</button>

<div class="ai-chat-box" id="aiChatBox">
    <div class="ai-chat-header">
        <div class="ai-chat-header-left">
            <div class="ai-header-avatar">
                <img src="{{ asset('images/cat-ai.png') }}" alt="Cat AI Avatar">
            </div>

            <div class="ai-chat-info">
                <h2>Mèo AI tư vấn khóa học</h2>
                <p>Hỗ trợ học tập thông minh</p>
            </div>
        </div>

        <button class="ai-chat-close" onclick="toggleAIChat()" type="button">×</button>
    </div>

    <div class="ai-chat-messages" id="aiChatMessages">
        <div class="message-row ai">
            <div class="message-avatar">
                <img src="{{ asset('images/cat-ai.png') }}" alt="Cat AI">
            </div>

            <div class="message ai">
                Xin chào 👋<br>Tôi có thể tư vấn khóa học, nội dung học, giáo viên và học phí cho bạn.
            </div>
        </div>
    </div>

    <form class="ai-chat-form" id="aiChatForm">
        @csrf

        <input
            type="text"
            id="aiChatInput"
            class="ai-chat-input"
            placeholder="Nhập câu hỏi của bạn..."
            autocomplete="off"
        >

        <button type="submit" class="ai-chat-send">
            ➤
        </button>
    </form>
</div>

<script>
    const AI_AVATAR_URL = "{{ asset('images/cat-ai.png') }}";
    const USER_INITIAL = "{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}";

    function toggleAIChat() {
        const box = document.getElementById('aiChatBox');

        if (box.style.display === 'flex') {
            box.style.display = 'none';
        } else {
            box.style.display = 'flex';
        }
    }

    const aiChatForm = document.getElementById('aiChatForm');
    const aiChatInput = document.getElementById('aiChatInput');
    const aiChatMessages = document.getElementById('aiChatMessages');

    aiChatForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const message = aiChatInput.value.trim();

        if (!message) return;

        appendMessage(message, 'user');

        aiChatInput.value = '';

        const loading = appendMessage('Mèo AI đang trả lời...', 'ai');

        try {
            const response = await fetch("{{ route('ai.chat') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    message: message
                })
            });

            const data = await response.json();

            loading.querySelector('.message').textContent =
                data.reply ?? 'Mèo AI chưa có phản hồi.';

        } catch (error) {
            loading.querySelector('.message').textContent =
                'Có lỗi xảy ra, vui lòng thử lại.';
        }

        aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
    });

    function appendMessage(text, type) {
        const row = document.createElement('div');
        row.className = 'message-row ' + type;

        const message = document.createElement('div');
        message.className = 'message ' + type;
        message.textContent = text;

        if (type === 'ai') {
            const avatar = document.createElement('div');
            avatar.className = 'message-avatar';

            const img = document.createElement('img');
            img.src = AI_AVATAR_URL;
            img.alt = 'Cat AI';

            avatar.appendChild(img);
            row.appendChild(avatar);
            row.appendChild(message);
        } else {
            const userAvatar = document.createElement('div');
            userAvatar.className = 'user-letter-avatar';
            userAvatar.textContent = USER_INITIAL;

            row.appendChild(message);
            row.appendChild(userAvatar);
        }

        aiChatMessages.appendChild(row);
        aiChatMessages.scrollTop = aiChatMessages.scrollHeight;

        return row;
    }
</script>
