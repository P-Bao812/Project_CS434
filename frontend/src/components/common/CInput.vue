<template>
  <div class="input-wrapper" :class="{ 'has-error': error }">
    <label v-if="label" class="input-label" :for="id">{{ label }}</label>
    <div class="input-container">
      <span v-if="$slots.prefix" class="input-prefix">
        <slot name="prefix"></slot>
      </span>
      
      <input 
        :id="id"
        :type="type" 
        :value="modelValue"
        :placeholder="placeholder"
        :disabled="disabled"
        class="input-field"
        @input="$emit('update:modelValue', $event.target.value)"
        @focus="$emit('focus', $event)"
        @blur="$emit('blur', $event)"
      />
      
      <span v-if="$slots.suffix" class="input-suffix">
        <slot name="suffix"></slot>
      </span>
    </div>
    <span v-if="error" class="error-message">{{ error }}</span>
  </div>
</template>

<script setup>
defineProps({
  modelValue: {
    type: [String, Number],
    default: ''
  },
  label: {
    type: String,
    default: ''
  },
  id: {
    type: String,
    default: () => 'input-' + Math.random().toString(36).substring(2, 9)
  },
  type: {
    type: String,
    default: 'text'
  },
  placeholder: {
    type: String,
    default: ''
  },
  error: {
    type: String,
    default: ''
  },
  disabled: {
    type: Boolean,
    default: false
  }
})

defineEmits(['update:modelValue', 'focus', 'blur'])
</script>

<style scoped>
.input-wrapper {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
  width: 100%;
}

.input-label {
  font-family: var(--font-body);
  font-weight: 500;
  font-size: 14px;
  color: var(--color-text-primary);
}

.input-container {
  display: flex;
  align-items: center;
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg); /* 12px */
  background-color: var(--color-surface);
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
  overflow: hidden;
}

.input-container:focus-within {
  border-color: var(--color-primary);
  box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}

.has-error .input-container {
  border-color: var(--color-error);
}
.has-error .input-container:focus-within {
  box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.2);
}

.input-field {
  flex: 1;
  border: none;
  background: transparent;
  padding: 0.75rem 1rem;
  font-family: var(--font-body);
  font-size: 14px;
  color: var(--color-text-primary);
  outline: none;
  width: 100%;
}

.input-field::placeholder {
  color: var(--color-text-secondary);
}

.input-field:disabled {
  background-color: var(--color-background);
  color: var(--color-text-secondary);
  cursor: not-allowed;
}

.input-prefix,
.input-suffix {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 0.75rem;
  color: var(--color-text-secondary);
}

.error-message {
  font-size: 12px;
  color: var(--color-error);
  margin-top: 0.25rem;
}
</style>
