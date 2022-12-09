<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import FrontendLayout from '@/Layouts/FrontendLayout.vue'
import Input from '@/Components/Input.vue'
import { ref, watch } from 'vue'
import debounce from 'lodash/debounce'
import Article from '@/Components/Article.vue'
import LinkButton from '@/Components/LinkButton.vue'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
	articles: Object,
	filters: Object,
})

let search = ref(props.filters.search)

watch(
	search,
	debounce(function (value) {
		Inertia.get(
			'/',
			{ search: value },
			{
				preserveState: true,
				replace: true,
			}
		)
	}, 300)
)
</script>

<template>

	<Head title="Home" />

	<FrontendLayout>
		<!-- Welcome message -->
		<div class="px-4 py-10 mb-4 bg-primary-50 dark:bg-black-600 sm:px-8 sm:mx-4 lg:mx-0">
			<span
				class="text-base text-black-300 dark:text-white-500 sm:text-xl transition ease-in-out duration-150">Bienvenue
				dans mon blog
			</span>
			<div class="mt-2 text-3xl font-medium leading-10 text-black-500 dark:text-white-50 sm:text-4xl">
				Tu trouveras ici des articles autour de la
				<span class="text-primary-500">blockchain</span>,
				<span class="text-primary-500">cyber securité</span>,
				<span class="text-primary-500">developpement</span> et de mes
				<span class="text-primary-500">autres hobbies</span>.
			</div>
		</div>

		<!-- Search -->
		<div class="mb-12 sm:mx-4 lg:mx-0">
			<Input type="text" class="block w-full p-4 text-center" placeholder="Entre un mot clé" v-model="search" />
		</div>

		<!-- Articles -->
		<div
			class="mb-12 grid grid-cols-1 gap-y-6 no-scrollbar sm:grid-cols-2 sm:gap-x-6 sm:px-4 lg:px-0 lg:grid-cols-3">
			<Article v-for="article in articles.data" :key="article.slug" :article="article"
				:show-image="article.banner != null"></Article>
		</div>

		<!-- No articles -->
		<div v-if="!articles.data.length"
			class="mb-12 text-base text-black-300 dark:text-white-500 transition ease-in-out duration-150 sm:text-xl">
			Pas de résultat ...
		</div>

		<!-- Infinite Scroll || Pagination -->
		<div class="flex items-center justify-center mb-12 w-full space-x-4"
			v-if="articles.prev_page_url || articles.next_page_url">
			<LinkButton v-if="articles.prev_page_url" :href="articles.prev_page_url">Précédant</LinkButton>
			<LinkButton v-if="articles.next_page_url" :href="articles.next_page_url">Suivant</LinkButton>
		</div>
	</FrontendLayout>
</template>
