<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
	href: {
		type: String,
		required: true,
	},
	active: {
		type: Boolean,
		default: false,
	},
	logout: {
		type: Boolean,
		default: false,
	},
})

const classes = computed(() =>
	props.logout
		? 'fill-error-500 hover:fill-error-700'
		: props.active
			? 'fill-primary-500 hover:fill-primary-700'
			: 'fill-black-500 dark:fill-white-500 hover:fill-primary-500 dark:hover:fill-primary-500'
)
</script>

<template>
	<Link :class="classes" :href="href" class="inline-flex items-center transition duration-150 ease-in-out">
	<slot />
	</Link>
</template>
