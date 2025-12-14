<template>
  <div class="w-full">
    <div v-if="showLabel" class="flex justify-between mb-1">
      <span class="text-sm font-medium text-gray-700"><slot></slot></span>
      <span class="text-sm font-medium text-gray-700">{{ Math.round(percentage) }}%</span>
    </div>
    <div :class="['w-full bg-gray-200 rounded-full overflow-hidden', sizeClass]">
      <div
        :class="[colorClass, sizeClass, 'rounded-full transition-all duration-300', striped ? 'bg-stripes' : '', animated ? 'animate-stripes' : '']"
        :style="{ width: percentage + '%' }"
        role="progressbar"
        :aria-valuenow="value"
        aria-valuemin="0"
        :aria-valuemax="max"
      ></div>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'LdProgress',
  props: {
    value: { type: Number, default: 0 },
    max: { type: Number, default: 100 },
    size: { type: String, default: 'md' },
    color: { type: String, default: 'blue' },
    showLabel: { type: Boolean, default: false },
    striped: { type: Boolean, default: false },
    animated: { type: Boolean, default: false }
  },
  setup(props) {
    const sizes = { sm: 'h-1', md: 'h-2', lg: 'h-4', xl: 'h-6' };
    const colors = { blue: 'bg-blue-600', green: 'bg-green-600', red: 'bg-red-600', yellow: 'bg-yellow-500', purple: 'bg-purple-600', gray: 'bg-gray-600' };
    const sizeClass = computed(() => sizes[props.size] || sizes.md);
    const colorClass = computed(() => colors[props.color] || colors.blue);
    const percentage = computed(() => props.max > 0 ? Math.min(100, (props.value / props.max) * 100) : 0);
    return { sizeClass, colorClass, percentage };
  }
};
</script>

<style scoped>
.bg-stripes { background-image: linear-gradient(45deg, rgba(255,255,255,.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,.15) 50%, rgba(255,255,255,.15) 75%, transparent 75%, transparent); background-size: 1rem 1rem; }
.animate-stripes { animation: stripes 1s linear infinite; }
@keyframes stripes { from { background-position: 1rem 0; } to { background-position: 0 0; } }
</style>
