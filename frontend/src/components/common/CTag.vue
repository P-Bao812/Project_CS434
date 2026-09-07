<template>
  <span :class="['tag', `tag-${variant}`]">
    <slot></slot>
    <button v-if="closable" class="close-btn" @click.stop="$emit('close')">&times;</button>
  </span>
</template>

<script setup>
defineProps({
  variant: {
    type: String,
    default: 'default',
    validator: (value) => ['default', 'primary', 'success', 'warning', 'error'].includes(value)
  },
  closable: {
    type: Boolean,
    default: false
  }
})
defineEmits(['close'])
</script>

<style scoped>
.tag {
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
  padding: 0.25rem 0.75rem;
  font-size: 12px;
  font-weight: 500;
  border-radius: var(--radius-md); /* 8px */
  white-space: nowrap;
}

.tag-default {
  background-color: var(--color-border);
  color: var(--color-text-primary);
}

.tag-primary {
  background-color: rgba(16, 185, 129, 0.1);
  color: var(--color-primary);
}

.tag-success {
  background-color: rgba(5, 150, 105, 0.1);
  color: var(--color-success);
}

.tag-warning {
  background-color: rgba(245, 158, 11, 0.1);
  color: var(--color-secondary);
}

.tag-error {
  background-color: rgba(220, 38, 38, 0.1);
  color: var(--color-error);
}

.close-btn {
  background: none;
  border: none;
  font-size: 14px;
  line-height: 1;
  color: inherit;
  cursor: pointer;
  padding: 0;
  opacity: 0.7;
  transition: opacity 0.2s;
}

.close-btn:hover {
  opacity: 1;
}
</style>
