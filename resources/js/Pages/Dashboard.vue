<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import LinkButton from '@/Components/LinkButton.vue'
import { Head } from '@inertiajs/inertia-vue3'
</script>

<template>

	<Head title="Dashboard" />

	<DashboardLayout>
		<div>
			<div class="mx-auto">
				<div class="flex flex-row items-center justify-between w-full mb-6 pb-4 border-b border-gray-200">
					<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
						Dashboard
					</h1>
					<div class="space-x-4">
						<LinkButton :href="route('articles.create')">Add article</LinkButton>
						<LinkButton :href="route('assets.create')">Import asset</LinkButton>
					</div>
				</div>
			</div>
		</div>
	</DashboardLayout>
</template>
