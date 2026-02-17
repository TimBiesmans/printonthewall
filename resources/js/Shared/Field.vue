<template>
  <div>
    <label class="block text-sm font-medium text-slate-700">
      {{ label }} <span v-if="required" class="text-red-600">*</span>
    </label>
    <input
      :type="type"
      :placeholder="placeholder"
      class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <p v-if="error" class="mt-1 text-xs text-red-600">{{ error }}</p>
  </div>
</template>

<script setup>
defineProps({
  label: String,
  modelValue: [String, Number],
  placeholder: { type: String, default: "" },
  type: { type: String, default: "text" },
  error: { type: String, default: "" },
  required: { type: Boolean, default: false },
});
defineEmits(["update:modelValue"]);
</script>