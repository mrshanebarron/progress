# Progress

A progress bar component for Laravel applications. Supports multiple colors, sizes, labels, and animated stripes. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/progress
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-progress :value="75" />
```

### With Label

```blade
<livewire:sb-progress :value="65" :show-label="true">
    Upload Progress
</livewire:sb-progress>
```

### Different Colors

```blade
<livewire:sb-progress :value="80" color="blue" />
<livewire:sb-progress :value="60" color="green" />
<livewire:sb-progress :value="40" color="red" />
<livewire:sb-progress :value="50" color="yellow" />
<livewire:sb-progress :value="70" color="purple" />
```

### Different Sizes

```blade
<livewire:sb-progress :value="75" size="sm" />
<livewire:sb-progress :value="75" size="md" />
<livewire:sb-progress :value="75" size="lg" />
<livewire:sb-progress :value="75" size="xl" />
```

### Striped & Animated

```blade
<livewire:sb-progress :value="50" :striped="true" />
<livewire:sb-progress :value="50" :striped="true" :animated="true" />
```

### Custom Max Value

```blade
<livewire:sb-progress :value="30" :max="50" :show-label="true">
    30 of 50 items
</livewire:sb-progress>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | number | `0` | Current progress value |
| `max` | number | `100` | Maximum value |
| `size` | string | `'md'` | Size: `sm`, `md`, `lg`, `xl` |
| `color` | string | `'blue'` | Color theme |
| `show-label` | boolean | `false` | Show percentage label |
| `striped` | boolean | `false` | Add stripe pattern |
| `animated` | boolean | `false` | Animate stripes |

## Vue 3 Usage

### Setup

```javascript
import { SbProgress } from './vendor/sb-progress';
app.component('SbProgress', SbProgress);
```

### Basic Usage

```vue
<template>
  <SbProgress :value="75" />
</template>
```

### With Label

```vue
<template>
  <SbProgress :value="progress" :show-label="true">
    Upload Progress
  </SbProgress>
</template>

<script setup>
import { ref } from 'vue';
const progress = ref(45);
</script>
```

### Colors

```vue
<template>
  <SbProgress :value="80" color="blue" />
  <SbProgress :value="60" color="green" />
  <SbProgress :value="40" color="red" />
  <SbProgress :value="50" color="yellow" />
  <SbProgress :value="70" color="purple" />
  <SbProgress :value="30" color="gray" />
</template>
```

### Sizes

```vue
<template>
  <SbProgress :value="75" size="sm" />  <!-- 4px height -->
  <SbProgress :value="75" size="md" />  <!-- 8px height -->
  <SbProgress :value="75" size="lg" />  <!-- 16px height -->
  <SbProgress :value="75" size="xl" />  <!-- 24px height -->
</template>
```

### Striped Progress

```vue
<template>
  <!-- Static stripes -->
  <SbProgress :value="50" striped />

  <!-- Animated stripes -->
  <SbProgress :value="50" striped animated />
</template>
```

### File Upload Example

```vue
<template>
  <div class="space-y-2">
    <div class="flex justify-between text-sm">
      <span>{{ file.name }}</span>
      <span>{{ formatBytes(file.size) }}</span>
    </div>
    <SbProgress
      :value="uploadProgress"
      :color="uploadProgress === 100 ? 'green' : 'blue'"
      striped
      :animated="uploadProgress < 100"
    />
  </div>
</template>
```

### Multi-Step Progress

```vue
<template>
  <SbProgress
    :value="currentStep"
    :max="totalSteps"
    :show-label="true"
    color="purple"
    size="lg"
  >
    Step {{ currentStep }} of {{ totalSteps }}
  </SbProgress>
</template>

<script setup>
const currentStep = ref(2);
const totalSteps = 5;
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | Number | `0` | Current value |
| `max` | Number | `100` | Maximum value |
| `size` | String | `'md'` | Height: `sm`, `md`, `lg`, `xl` |
| `color` | String | `'blue'` | Color: `blue`, `green`, `red`, `yellow`, `purple`, `gray` |
| `showLabel` | Boolean | `false` | Display percentage |
| `striped` | Boolean | `false` | Stripe pattern overlay |
| `animated` | Boolean | `false` | Animate stripe movement |

### Slots

| Slot | Description |
|------|-------------|
| default | Label text (left side) |

## Size Reference

| Size | Height |
|------|--------|
| `sm` | 4px |
| `md` | 8px |
| `lg` | 16px |
| `xl` | 24px |

## Color Options

| Color | Class |
|-------|-------|
| `blue` | bg-blue-600 |
| `green` | bg-green-600 |
| `red` | bg-red-600 |
| `yellow` | bg-yellow-500 |
| `purple` | bg-purple-600 |
| `gray` | bg-gray-600 |

## Accessibility

- `role="progressbar"` attribute
- `aria-valuenow`, `aria-valuemin`, `aria-valuemax`
- Percentage label for screen readers

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
