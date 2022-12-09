<script setup>
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
</script>

<template>
	<div class="min-h-screen flex flex-col justify-between">
		<!-- Header -->
		<Header class="mb-12" />

		<!-- Page Content -->
		<main class="max-w-5xl mx-auto w-full">
			<slot />
		</main>

		<!-- Footer -->
		<Footer />
	</div>
</template>
