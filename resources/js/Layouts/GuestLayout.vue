<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
	<div class="min-h-screen flex flex-col justify-center items-center">
		<!-- Logo -->
		<Link :href="route('home')"
			class="w-full h-full text-3xl
						font-semibold text-primary-500 block mb-6 sm:w-auto">
		Taftadjani
		</Link>

		<div class="w-full max-w-xl px-8 shadow-md overflow-hidden">
			<slot />
		</div>
	</div>
</template>
