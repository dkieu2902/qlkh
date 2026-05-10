<style>
    .ai-chat-button {
        position: fixed;
        right: 24px;
        bottom: 24px;
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        border: none;
        font-size: 26px;
        cursor: pointer;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        z-index: 9999;
    }

    .ai-chat-box {
        position: fixed;
        right: 24px;
        bottom: 92px;
        width: 360px;
        height: 480px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        display: none;
        flex-direction: column;
        overflow: hidden;
        z-index: 9999;
        border: 1px solid #e5e7eb;
    }

    .ai-chat-header {
        background: #2563eb;
        color: white;
        padding: 14px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
    }

    .ai-chat-close {
        background: transparent;
        border: none;
        color: white;
        font-size: 22px;
        cursor: pointer;
    }

    .ai-chat-messages {
        flex: 1;
        padding: 14px;
        overflow-y: auto;
        background: #f8fafc;
    }

    .ai-message,
    .user-message {
        max-width: 85%;
        padding: 10px 12px;
        margin-bottom: 10px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.45;
        white-space: pre-wrap;
    }

    .ai-message {
        background: #e5e7eb;
        color: #111827;
        margin-right: auto;
    }

    .user-message {
        background: #2563eb;
        color: white;
        margin-left: auto;
    }

    .ai-chat-form {
        display: flex;
        padding: 12px;
        border-top: 1px solid #e5e7eb;
        background: white;
        gap: 8px;
    }

    .ai-chat-input {
        flex: 1;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 10px;
        outline: none;
        font-size: 14px;
    }

    .ai-chat-send {
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0 14px;
        cursor: pointer;
    }

    @media (max-width: 480px) {
        .ai-chat-box {
            width: calc(100% - 32px);
            right: 16px;
            bottom: 86px;
        }

        .ai-chat-button {
            right: 16px;
            bottom: 16px;
        }
    }
</style>

<button class="ai-chat-button" onclick="toggleAIChat()">💬</button>

<div class="ai-chat-box" id="aiChatBox">
    <div class="ai-chat-header">
        <span>AI tư vấn khóa học</span>
        <button class="ai-chat-close" onclick="toggleAIChat()">×</button>
    </div>

    <div class="ai-chat-messages" id="aiChatMessages">
        <div class="ai-message">
            Xin chào! Tôi có thể tư vấn khóa học, giá khóa học, giáo viên và nội dung bài học cho bạn.
        </div>
    </div>

    <form class="ai-chat-form" id="aiChatForm">
        @csrf
        <input
            type="text"
            class="ai-chat-input"
            id="aiChatInput"
            placeholder="Nhập câu hỏi..."
            autocomplete="off"
        >
        <button type="submit" class="ai-chat-send">Gửi</button>
    </form>
</div>

<script>
    function toggleAIChat() {
        const box = document.getElementById('aiChatBox');
        box.style.display = box.style.display === 'flex' ? 'none' : 'flex';
    }

    const aiChatForm = document.getElementById('aiChatForm');
    const aiChatInput = document.getElementById('aiChatInput');
    const aiChatMessages = document.getElementById('aiChatMessages');

    aiChatForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const message = aiChatInput.value.trim();

        if (!message) return;

        appendMessage(message, 'user-message');
        aiChatInput.value = '';

        const loadingMessage = appendMessage('AI đang trả lời...', 'ai-message');

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

            loadingMessage.textContent = data.reply ?? 'AI chưa có phản hồi.';
        } catch (error) {
            loadingMessage.textContent = 'Có lỗi xảy ra, vui lòng thử lại.';
        }

        aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
    });

    function appendMessage(text, className) {
        const div = document.createElement('div');
        div.className = className;
        div.textContent = text;
        aiChatMessages.appendChild(div);
        aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
        return div;
    }
</script>
