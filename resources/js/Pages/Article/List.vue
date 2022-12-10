<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import LinkButton from '@/Components/LinkButton.vue'
import NoResult from '@/Components/NoResult.vue'
import Article from '@/Components/Article.vue'

defineProps({
	articles: Object,
})
</script>

<template>

	<Head title="Create Article" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full mt-6">
			<div class="flex flex-row items-center justify-between mb-6">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					List Article
				</h1>

				<LinkButton :href="route('login')">Add</LinkButton>
			</div>

			<div class="h-full">
				<!-- Articles -->
				<div
					class="grid gap-y-6 no-scrollbar grid-cols-1 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 mb-12">
					<Article v-for="article in articles.data" :key="article.slug" :article="article"
						:show-image="article.banner != null"></Article>
				</div>

				<!-- No articles -->
				<NoResult v-if="!articles.data.length"></NoResult>

				<!-- Infinite Scroll || Pagination -->
				<div class="flex items-center justify-center w-full space-x-4 mb-12"
					v-if="articles.prev_page_url || articles.next_page_url">
					<LinkButton v-if="articles.prev_page_url" :href="articles.prev_page_url">Précédant</LinkButton>
					<LinkButton v-if="articles.next_page_url" :href="articles.next_page_url">Suivant</LinkButton>
				</div>
			</div>
		</div>
	</DashboardLayout>
</template>
