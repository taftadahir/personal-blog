<template>
	<Link :href="route('assets.edit', { asset: asset.id })">
	<img :src="'/storage/assets/' + asset.file_name" :alt="asset.file_name"
		class="w-full aspect-video hover:scale-95 transition-all duration-150 ease-linear"
		v-if="asset.extension == 'jpg'" />
	<div v-else
		class="h-full flex items-center justify-center border-2 border-transparent hover:border-primary-500 transition-all duration-150 ease-linear text-xl">
		<span>{{ asset.original_name }}</span>
	</div>
	</Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
	asset: {
		type: Object,
		required: true,
	},
})
</script>
