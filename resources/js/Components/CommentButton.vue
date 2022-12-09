<script setup>
const props = defineProps({
	type: {
		type: String,
		default: 'default',
	},
})
var typeClass =
	'bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700'

if (props.type == 'selected') {
	typeClass = 'bg-error-500 dark:bg-error-500 hover:bg-error-700 dark:hover:bg-error-700 active:bg-error-700 dark:active:bg-error-700 focus:outline-none dark:focus:outline-none focus:bg-error-700 dark:focus:bg-error-700'
}
</script>

<template>
	<button :class="typeClass"
		class="inline-flex items-center justify-center border border-transparent transition ease-in-out duration-150 w-8 max-h-14"></button>
</template>
