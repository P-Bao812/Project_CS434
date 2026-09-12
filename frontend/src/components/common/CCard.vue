<template>
  <div :class="['card', { 'card-hover': hoverable, 'card-interactive': interactive }]" @click="interactive ? $emit('click') : null">
    <div v-if="$slots.image" class="card-image">
      <slot name="image"></slot>
    </div>
    <div class="card-content">
      <slot></slot>
    </div>
    <div v-if="$slots.footer" class="card-footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script setup>
defineProps({
  hoverable: {
    type: Boolean,
    default: true
  },
  interactive: {
    type: Boolean,
    default: false
  }
})
defineEmits(['click'])
</script>

<style scoped>
.card {
  background-color: var(--color-surface);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg); /* 12px */
  box-shadow: var(--shadow-md);
  overflow: hidden;
  transition: transform var(--transition-fast), box-shadow var(--transition-fast), border-color var(--transition-fast);
  display: flex;
  flex-direction: column;
}

.card-hover:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-2xl);
}

.card-interactive {
  cursor: pointer;
}

.card-interactive:hover {
  border-color: var(--color-primary);
}

.card-image {
  width: 100%;
  aspect-ratio: 4/3;
  overflow: hidden;
}

.card-image :deep(img) {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.card-interactive:hover .card-image :deep(img) {
  transform: scale(1.05);
}

.card-content {
  padding: 1.25rem;
  flex: 1;
}

.card-footer {
  padding: 1rem 1.25rem;
  border-top: 1px solid var(--color-border);
  background-color: var(--color-background);
}
</style>
