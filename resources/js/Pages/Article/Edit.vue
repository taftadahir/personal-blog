<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Head, useForm, Link } from '@inertiajs/inertia-vue3'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import TrashOutline from '@/Components/Icons/TrashOutline.vue'
import ValidationError from '@/Components/ValidationError.vue'
import Textarea from '@/Components/Textarea.vue'
import SidebarItem from '@/Components/SidebarItem.vue'
import EyeOutline from '@/Components/Icons/EyeOutline.vue'
import useSlugify from '@/Composables/useSlugify'
import { watch, ref } from 'vue'

const { slugify } = useSlugify()

const props = defineProps({
	article: Object,
	assets: Array,
})

const form = useForm({
	banner: props.article.banner_id,
	title: props.article.title,
	slug: props.article.slug,
	read_time: props.article.read_time,
	view_count: props.article.view_count,
	published: props.article.published,
	excerpt: props.article.excerpt,
	content: props.article.content,
})

let newBanner = ref(props.assets.find((item) => item.id == form.banner))

watch(
	() => form.banner,
	() => {
		newBanner = props.assets.find((item) => item.id == form.banner)
	}
)

// Auto-slugifying watcher
watch(
	() => form.title,
	(newTitle, _) => {
		form.slug = slugify(newTitle)
	}
)

const submit = () => {
	form.put(
		route('articles.update', {
			article: props.article.id,
		})
	)
}
</script>

<template>

	<Head title="Edit Article" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full mt-6">
			<div class="flex flex-row items-center justify-between mb-6">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					Edit Article
				</h1>

				<div class="flex flex-row space-x-4">
					<Link target="_blank" :href="route('single', { article: props.article.slug })"
						class="flex items-center justify-center whitespace-nowrap">
					<EyeOutline
						class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
					</Link>
					<SidebarItem :active="false" :href="
						route('articles.destroy', { article: article.id })
					" :logout="true" as="button" method="delete">
						<TrashOutline class=""></TrashOutline>
					</SidebarItem>
					<Button @click="submit">Save</Button>
				</div>
			</div>

			<div class="h-full">
				<form class="flex flex-row space-x-6 mb-6">
					<div class="flex flex-col items-start space-y-4 w-full max-w-lg">
						<div class="w-full">
							<Label for="title" value="Title" />
							<Input id="title" v-model="form.title" autofocus class="block w-full mt-2 p-4"
								placeholder="Fill the title" required type="text" />
							<ValidationError input="title" />
						</div>

						<div class="w-full">
							<Label for="slug" value="Slug" />
							<Input id="slug" v-model="form.slug" class="block w-full mt-2 p-4"
								placeholder="Fill the slug" required type="text" />
							<ValidationError input="slug" />
						</div>

						<div class="w-full">
							<Label for="read_time" value="Read time" />
							<Input id="read_time" v-model="form.read_time" class="block w-full mt-2 p-4"
								placeholder="Fill read time in minutes" type="number" />
							<ValidationError input="read_time" />
						</div>

						<div class="w-full">
							<Label for="view_count" value="View count" />
							<Input id="view_count" v-model="form.view_count" class="block w-full mt-2 p-4"
								placeholder="" type="number" readonly />
						</div>

						<div class="w-full">
							<Label for="published" value="Published" />
							<input type="checkbox" v-model="form.published" id="published"
								class="w-4 h-4 text-primary-500 bg-white-500 border-primary-50 focus:ring-primary-50 rounded dark:focus:ring-black-600 dark:ring-offset-primary-600 focus:ring-2 dark:bg-black-600 dark:border-black-600 checked:border-primary-500 checked:ring-primary-500 checked:bg-primary-500" />
							<ValidationError input="published" />
						</div>

						<div class="w-full space-y-2" v-if="assets.length">
							<Label for="banner" value="Banner" />
							<select id="banner"
								class="w-full p-4 bg-white-500 border-primary-50 focus:ring-primary-50 rounded dark:focus:ring-black-600 dark:ring-offset-primary-600 focus:ring-2 dark:bg-black-600 dark:border-black-600 checked:border-primary-500 checked:ring-primary-500 checked:bg-primary-500 mt-2"
								v-model="form.banner">
								<option :value="null" selected>
									--- Select an option ---
								</option>
								<option v-for="asset in assets" :key="asset.file_name" :value="asset.id"
									v-text="asset.file_name" />
							</select>
							<ValidationError input="banner" />

							<img :src="'/storage/assets/' + newBanner.file_name" :alt="newBanner.file_name"
								class="w-full aspect-video" v-if="newBanner" />
						</div>
					</div>

					<div class="w-full space-y-6">
						<div class="w-full">
							<Label for="excerpt" value="Excerpt" />
							<Textarea id="excerpt" v-model="form.excerpt" class="block w-full mt-2" name="excerpt"
								placeholder="Fill the excerpt" rows="4" />
							<ValidationError input="excerpt" />
						</div>

						<div class="w-full">
							<Label for="content" value="Content" />
							<Textarea id="content" v-model="form.content" class="block w-full mt-2" name="content"
								placeholder="Fill the content" rows="24" />
							<ValidationError input="content" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</DashboardLayout>
</template>
