<script setup>
import { Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
	article: {
		type: Object,
		required: true,
	},

	showImage: {
		type: Boolean,
		required: false,
		default: true,
	},

	toEdit: {
		type: Boolean,
		default: false,
	},
})

const url = props.toEdit
	? route('articles.edit', {
		article: +props.article.id,
	})
	: route('single', { article: props.article.slug })
</script>

<template>
	<article class="group w-full transition ease-in-out duration-150">
		<Link class="space-y-2" :href="url">
		<img :src="'/storage/assets/' + article.banner.file_name" alt="Article
						Image" class="w-full aspect-video"
			v-if="showImage" />
		<div class="px-4 space-y-2 sm:px-0">
			<h3
				class="font-medium block text-lg leading-7 text-black-500 dark:text-white-50 group-hover:text-primary-500 line-clamp overflow-y-hidden transition ease-in-out duration-150">
				{{ article.title }}
			</h3>
			<span class="block text-sm text-black-300 dark:text-white-600 group-hover:opacity-50">Publié le {{
					article.published_at
			}} -
				{{ article.read_time }} mins de lecture</span>
		</div>
		</Link>
	</article>
</template>
