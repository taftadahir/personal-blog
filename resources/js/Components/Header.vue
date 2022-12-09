<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Button from '@/Components/Button.vue'
import Newsletter from '@/Components/Newsletter.vue'
</script>

<template>
	<nav class="w-full h-28 bg-primary-50 dark:bg-black-600">
		<header
			class="max-w-5xl w-full h-full mx-auto flex flex-col items-center justify-between sm:px-4 sm:flex-row lg:px-0">
			<!-- Logo -->
			<Link :href="route('home')"
				class="flex items-center justify-center w-full h-full text-3xl font-semibold text-primary-500 sm:w-auto">
			Taftadjani
			</Link>

			<!-- Right nav -->
			<Newsletter>
				<template #trigger>
					<Button class="w-full sm:w-auto">Subscribe</Button></template>
			</Newsletter>
		</header>
	</nav>
</template>
