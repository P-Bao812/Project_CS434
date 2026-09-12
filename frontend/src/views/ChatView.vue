<template>
  <div class="chat-page container py-8">
    <div class="chat-container bg-surface border rounded-lg shadow-md flex-col">
      <div class="chat-header p-4 border-b">
        <h2 class="text-primary m-0">Trợ lý AI CookMate</h2>
        <p class="text-caption text-secondary">Hỏi tôi bất cứ điều gì về ẩm thực và công thức nấu ăn</p>
      </div>
      
      <div class="chat-messages p-4 flex-col gap-4 overflow-y-auto">
        <div 
          v-for="(msg, idx) in messages" 
          :key="idx" 
          :class="['message', msg.role === 'user' ? 'message-user' : 'message-bot']"
        >
          <div class="message-bubble" :class="msg.role === 'user' ? 'bg-primary text-white' : 'bg-gray border'">
            {{ msg.content }}
          </div>
        </div>
        
        <div v-if="loading" class="message message-bot">
          <div class="message-bubble bg-gray border typing-indicator">
            <span>.</span><span>.</span><span>.</span>
          </div>
        </div>
      </div>
      
      <div class="chat-input p-4 border-t flex gap-2">
        <CInput 
          v-model="inputMsg" 
          placeholder="Nhập câu hỏi của bạn (VD: Tối nay ăn gì ngon?)..." 
          @keyup.enter="sendMessage" 
          class="flex-1"
        />
        <CButton variant="primary" @click="sendMessage" :disabled="loading || !inputMsg.trim()">Gửi</CButton>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, nextTick } from 'vue'
import CInput from '@/components/common/CInput.vue'
import CButton from '@/components/common/CButton.vue'

const inputMsg = ref('')
const loading = ref(false)
const messages = ref([
  { role: 'bot', content: 'Xin chào! Tôi là trợ lý CookMate. Tôi có thể giúp gì cho bạn hôm nay?' }
])

const sendMessage = async () => {
  const text = inputMsg.value.trim()
  if (!text) return
  
  messages.value.push({ role: 'user', content: text })
  inputMsg.value = ''
  loading.value = true
  
  // Scroll to bottom (mocking)
  const chatMessages = document.querySelector('.chat-messages')
  if (chatMessages) {
    nextTick(() => { chatMessages.scrollTop = chatMessages.scrollHeight })
  }
  
  // Mock API delay
  await new Promise(r => setTimeout(r, 1500))
  
  messages.value.push({ role: 'bot', content: `CookMate AI đang trong quá trình phát triển. Dưới đây là gợi ý cho "${text}": Bạn có thể thử món Gà nướng mật ong hoặc Canh chua cá lóc.` })
  loading.value = false
  
  if (chatMessages) {
    nextTick(() => { chatMessages.scrollTop = chatMessages.scrollHeight })
  }
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.chat-container {
  max-width: 800px;
  margin: 0 auto;
  height: 600px;
  display: flex;
}
.chat-messages {
  flex: 1;
  overflow-y: auto;
}
.border { border: 1px solid var(--color-border); }
.border-b { border-bottom: 1px solid var(--color-border); }
.border-t { border-top: 1px solid var(--color-border); }

.message {
  display: flex;
  margin-bottom: 1rem;
}
.message-user {
  justify-content: flex-end;
}
.message-bot {
  justify-content: flex-start;
}
.message-bubble {
  max-width: 70%;
  padding: 0.75rem 1rem;
  border-radius: var(--radius-lg);
  line-height: 1.5;
}
.bg-primary { background-color: var(--color-primary); color: white; }
.bg-gray { background-color: var(--color-background); }

.typing-indicator span {
  animation: typing 1.4s infinite both;
  font-size: 20px;
  line-height: 1;
}
.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
  0%, 80%, 100% { opacity: 0; }
  40% { opacity: 1; }
}
</style>
