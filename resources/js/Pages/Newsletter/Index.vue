<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import LinkButton from '@/Components/LinkButton.vue'
import NoResult from '@/Components/NoResult.vue'
import NewsletterComponent from '@/Components/NewsletterComponent.vue'

defineProps({
	newsletters: Object,
})
</script>

<template>

	<Head title="Newsletter" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full mt-6">
			<div class="flex flex-row items-center justify-between mb-6">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					List newsletter
				</h1>
			</div>

			<div class="h-full">
				<div
					class="grid gap-y-6 no-scrollbar grid-cols-1 mb-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
					<NewsletterComponent v-for="(newsletter, i) in newsletters.data" :key="newsletter.id"
						:newsletter="newsletter" :is-even="i % 2 == 0"></NewsletterComponent>
				</div>

				<!-- No newsletter -->
				<NoResult v-if="!newsletters.data.length"></NoResult>

				<!-- Infinite Scroll || Pagination -->
				<div class="flex items-center justify-center mb-12 w-full space-x-4" v-if="
					newsletters.prev_page_url || newsletters.next_page_url
				">
					<LinkButton v-if="newsletters.prev_page_url" :href="newsletters.prev_page_url">Précédant
					</LinkButton>
					<LinkButton v-if="newsletters.next_page_url" :href="newsletters.next_page_url">Suivant</LinkButton>
				</div>
			</div>
		</div>
	</DashboardLayout>
</template>
