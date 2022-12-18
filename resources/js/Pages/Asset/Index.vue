<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import Asset from '@/Components/Asset.vue'
import NoResult from '@/Components/NoResult.vue'
import LinkButton from '@/Components/LinkButton.vue'

defineProps({
	assets: Object,
})
</script>

<template>

	<Head title="Assets" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full">
			<div class="flex flex-row items-center justify-between mb-6 pb-4 border-b border-gray-200">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					Assets
				</h1>

				<LinkButton :href="route('assets.create')">Import</LinkButton>
			</div>

			<div class="h-full">
				<div
					class="grid gap-y-6 no-scrollbar grid-cols-1 mb-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5"
										v-if="assets.data.length">
					<Asset v-for="asset in assets.data" :key="asset.file_name" :asset="asset"></Asset>
				</div>

				<!-- No assets -->
				<NoResult v-if="!assets.data.length"></NoResult>

				<!-- Infinite Scroll || Pagination -->
				<div class="flex items-center justify-center mb-12 w-full space-x-4"
					v-if="assets.prev_page_url || assets.next_page_url">
					<LinkButton v-if="assets.prev_page_url" :href="assets.prev_page_url">Précédant</LinkButton>
					<LinkButton v-if="assets.next_page_url" :href="assets.next_page_url">Suivant</LinkButton>
				</div>
			</div>
		</div>
	</DashboardLayout>
</template>
