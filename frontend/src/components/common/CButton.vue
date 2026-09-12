<template>
  <button 
    :class="[
      'btn',
      `btn-${variant}`,
      { 'btn-full': fullWidth, 'btn-disabled': disabled, 'btn-loading': loading }
    ]"
    :disabled="disabled || loading"
    @click="$emit('click')"
  >
    <span v-if="loading" class="spinner"></span>
    <span v-else class="content">
      <slot name="prefix"></slot>
      <slot></slot>
      <slot name="suffix"></slot>
    </span>
  </button>
</template>

<script setup>
defineProps({
  variant: {
    type: String,
    default: 'primary',
    validator: (value) => ['primary', 'secondary', 'outline', 'ghost', 'danger'].includes(value)
  },
  fullWidth: {
    type: Boolean,
    default: false
  },
  disabled: {
    type: Boolean,
    default: false
  },
  loading: {
    type: Boolean,
    default: false
  }
})

defineEmits(['click'])
</script>

<style scoped>
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.625rem 1.25rem;
  font-family: var(--font-body);
  font-weight: 600;
  font-size: 14px;
  border-radius: var(--radius-md); /* 8px */
  border: none;
  cursor: pointer;
  transition: all var(--transition-fast);
}

.btn-full {
  width: 100%;
}

.btn-disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

/* Variants */
.btn-primary {
  background-color: var(--color-primary);
  color: #fff;
}
.btn-primary:hover:not(.btn-disabled) {
  background-color: var(--color-primary-hover);
}

.btn-secondary {
  background-color: var(--color-secondary);
  color: #fff;
}
.btn-secondary:hover:not(.btn-disabled) {
  opacity: 0.9;
}

.btn-danger {
  background-color: var(--color-error);
  color: #fff;
}
.btn-danger:hover:not(.btn-disabled) {
  opacity: 0.9;
}

.btn-outline {
  background-color: transparent;
  color: var(--color-primary);
  border: 1px solid var(--color-primary);
}
.btn-outline:hover:not(.btn-disabled) {
  background-color: rgba(16, 185, 129, 0.1);
}

.btn-ghost {
  background-color: transparent;
  color: var(--color-text-primary);
}
.btn-ghost:hover:not(.btn-disabled) {
  background-color: rgba(0, 0, 0, 0.05);
}

.content {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.spinner {
  display: inline-block;
  width: 1rem;
  height: 1rem;
  border: 2px solid rgba(255,255,255,0.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>
