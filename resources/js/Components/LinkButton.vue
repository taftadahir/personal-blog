<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
	type: {
		type: String,
		default: 'primary',
	},

	href: {
		type: String,
		required: true,
	},
})

var typeClass =
	'bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700 text-white-50'

if (props.type == 'error') {
	typeClass =
		'bg-error-500 dark:bg-error-500 hover:bg-error-700 hover:dark:bg-error-700 text-white-50 dark:text-white-50 focus:outline-none'
}
</script>

<template>
	<Link class="px-6 inline-flex items-center justify-center border border-transparent font-semibold text-xs uppercase tracking-widest py-2 transition ease-in-out duration-150" :href="href" :class="typeClass">
	<slot />
	</Link>
</template>
