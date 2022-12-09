<script setup>
const props = defineProps({
	typeTag: {
		type: String,
		default: 'submit',
	},

	type: {
		type: String,
		default: 'primary',
	},
})

var typeClass =
	'bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700'

if (props.type == 'error') {
	typeClass =
		'bg-error-500 dark:bg-error-500 hover:bg-error-700 dark:hover:bg-error-700 active:bg-error-700 dark:active:bg-error-700 focus:outline-none dark:focus:outline-none focus:bg-error-700 dark:focus:bg-error-700'
}
</script>

<template>
	<button
		class="px-6 inline-flex items-center justify-center border border-transparent font-semibold text-xs uppercase tracking-widest py-3 transition ease-in-out duration-150 text-white-50"
		:class="typeClass" :type="typeTag">
		<slot />
	</button>
</template>
