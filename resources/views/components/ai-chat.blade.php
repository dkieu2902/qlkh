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
        width: 66px;
        height: 66px;
        border-radius: 24px;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        border: none;
        cursor: pointer;
        box-shadow: 0 22px 45px rgba(37, 99, 235, 0.38);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.25s ease;
    }

    .ai-chat-button:hover {
        transform: translateY(-4px) scale(1.03);
    }

    .ai-chat-button img {
        width: 38px;
        height: 38px;
        object-fit: cover;
    }

    .ai-chat-box {
        position: fixed;
        right: 24px;
        bottom: 104px;
        width: 410px;
        height: 590px;
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(18px);
        border-radius: 30px;
        overflow: hidden;
        display: none;
        flex-direction: column;
        z-index: 99999;
        border: 1px solid rgba(226, 232, 240, 0.95);
        box-shadow: 0 32px 85px rgba(15, 23, 42, 0.28);
    }

    .ai-chat-header {
        background:
            radial-gradient(circle at top left, rgba(255, 255, 255, 0.25), transparent 35%),
            linear-gradient(135deg, #2563eb, #4f46e5 55%, #7c3aed);
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
        width: 54px;
        height: 54px;
        border-radius: 18px;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.22);
        background: rgba(255, 255, 255, 0.14);
        flex-shrink: 0;
    }

    .ai-header-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ai-chat-info h2 {
        font-size: 16px;
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .ai-chat-info p {
        font-size: 12px;
        opacity: 0.86;
        font-weight: 600;
    }

    .ai-chat-close {
        width: 38px;
        height: 38px;
        border-radius: 14px;
        border: none;
        background: rgba(255, 255, 255, 0.16);
        color: white;
        font-size: 24px;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .ai-chat-close:hover {
        background: rgba(255, 255, 255, 0.26);
        transform: rotate(90deg);
    }

    .ai-chat-messages {
        flex: 1;
        padding: 18px;
        overflow-y: auto;
        background:
            radial-gradient(circle at top right, rgba(37, 99, 235, 0.08), transparent 30%),
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
        width: 34px;
        height: 34px;
        border-radius: 12px;
        overflow: hidden;
        flex: 0 0 34px;
        background: #e2e8f0;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
    }

    .message-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-letter-avatar {
        width: 34px;
        height: 34px;
        border-radius: 12px;
        flex: 0 0 34px;
        background: linear-gradient(135deg, #0f172a, #334155);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 900;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.12);
    }

    .message {
        max-width: 76%;
        padding: 13px 15px;
        border-radius: 20px;
        font-size: 14px;
        line-height: 1.6;
        white-space: pre-wrap;
        word-break: break-word;
    }

    .message.ai {
        background: white;
        color: #0f172a;
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: 6px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .message.user {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        border-bottom-right-radius: 6px;
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.22);
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
        border-radius: 16px;
        border: 1px solid #dbe3ef;
        background: #f8fafc;
        padding: 0 16px;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
    }

    .ai-chat-input:focus {
        background: white;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .ai-chat-send {
        width: 48px;
        height: 48px;
        border: none;
        border-radius: 16px;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        color: white;
        cursor: pointer;
        flex-shrink: 0;
        transition: 0.25s ease;
        font-size: 20px;
    }

    .ai-chat-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 26px rgba(37, 99, 235, 0.28);
    }

    @media (max-width: 480px) {
        .ai-chat-box {
            width: calc(100% - 20px);
            right: 10px;
            bottom: 88px;
            height: 72vh;
            border-radius: 24px;
        }

        .ai-chat-button {
            right: 14px;
            bottom: 14px;
            width: 58px;
            height: 58px;
            border-radius: 20px;
        }

        .message {
            max-width: 74%;
        }
    }
</style>

<button class="ai-chat-button" onclick="toggleAIChat()" type="button">
    <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="AI">
</button>

<div class="ai-chat-box" id="aiChatBox">
    <div class="ai-chat-header">
        <div class="ai-chat-header-left">
            <div class="ai-header-avatar">
                <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="AI Avatar">
            </div>

            <div class="ai-chat-info">
                <h2>AI tư vấn khóa học</h2>
                <p>Hỗ trợ học tập thông minh</p>
            </div>
        </div>

        <button class="ai-chat-close" onclick="toggleAIChat()" type="button">×</button>
    </div>

    <div class="ai-chat-messages" id="aiChatMessages">
        <div class="message-row ai">
            <div class="message-avatar">
                <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="AI">
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
    const AI_AVATAR_URL = 'https://cdn-icons-png.flaticon.com/512/4712/4712109.png';
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

        const loading = appendMessage('AI đang trả lời...', 'ai');

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
                data.reply ?? 'AI chưa có phản hồi.';

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
            img.alt = 'AI';

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
