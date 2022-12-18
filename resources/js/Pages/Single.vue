<script setup>
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3'
import { onMounted } from '@vue/runtime-core'
import FrontendLayout from '@/Layouts/FrontendLayout.vue'
import Article from '@/Components/Article.vue'
import Input from '@/Components/Input.vue'
import ValidationError from '@/Components/ValidationError.vue'
import Textarea from '@/Components/Textarea.vue'
import Button from '@/Components/Button.vue'
import SidebarItem from '@/Components/SidebarItem.vue'
import TrashOutline from '@/Components/Icons/TrashOutline.vue'
import '@/prism.js'

onMounted(() => {
	Prism.highlightAll()
})

const props = defineProps({
	article: Object,
	articles: Object,
	comments: Object,
})

const form = useForm({
	article_id: props.article.id,
	user_id:
		usePage().props.value.auth.user != null
			? usePage().props.value.auth.user.id
			: null,
	user_name: null,
	email: null,
	content: null,
})

const submit = () => {
	form.post(route('comments.store'), {
		onFinish: () => (form.content = null),
	})
}
</script>

<template>

	<Head :title="article.title" />

	<FrontendLayout class="text-black-500 dark:text-white-50 single">
		<div class="flex flex-col items-center lg:flex-row justify-center lg:justify-center:space-x-10 sm:px-4 lg:px-0">
			<div class="w-full max-w-3xl">
				<!-- Title -->
				<h1 v-text="article.title" class="mx-4 sm:mx-0"></h1>

				<div>
					<!-- article details -->
					<div class="mx-4 sm:mx-0 mb-4 text-base text-white-600">
						<span class="" v-if="article.published_at">Publié le {{ article.published_at }}</span>
						<span v-if="article.read_time">
							- {{ article.read_time }} min(s) de lecture</span>
					</div>

					<!-- Banner & Summary -->
					<div class="mb-6" v-if="article.banner != null || article.banner">
						<img :src="'/storage/assets/' + article.banner.file_name" alt="Article Image"
							v-if="article.banner != null" class="block mb-4" />
						<summary v-if="article.excerpt" v-html="article.excerpt" class="mx-4 sm:mx-0 block"></summary>
					</div>

					<!-- Body -->
					<div v-html="article.content" v-if="article.content" class="content mb-12"></div>

					<!-- Comments -->
					<div class="comments space-y-12 mx-4 sm:mx-0 mb-12">
						<!-- Add comments -->
						<div class="space-y-4">
							<div class="mb-4 w-full flex flex-row justify-between items-center">
								<h1 class="mb-0">Commentaires</h1>
							</div>
							<form class="space-y-4">
								<div class="w-full flex flex-col sm:flex-row justify-between items-start space-y-4 sm:space-y-0 sm:space-x-4"
									v-if="!$page.props.auth.user">
									<div class="w-full sm:max-w-lg">
										<Input id="user_name" v-model="form.user_name" autocomplete="name"
											class="block w-full mt-2 p-4" placeholder="Entrez votre nom" required type="text" />
										<ValidationError input="user_name" />
									</div>

									<div class="w-full sm:max-w-lg">
										<Input id="email" v-model="form.email" class="block w-full mt-2 p-4"
											placeholder="Entrez votre email" required type="text" />
										<ValidationError input="email" />
									</div>
								</div>
								<div class="w-full space-y-2">
									<Textarea id="content" v-model="form.content" class="block w-full p-4"
										name="content" placeholder="Saisissez le contenu de votre commentaires" rows="4" required />
									<ValidationError input="content" />
								</div>
							</form>
							<div class="flex flex-row justify-end w-full">
								<Button @click="submit">Envoyer</Button>
							</div>
						</div>

						<!-- Existing comments -->
						<div v-if="comments.data.length" class="space-y-4">
							<div class="flex flex-col" v-for="comment in comments.data" key="comment.id">
								<div class="flex flex-row items-center justify-between">
									<h4>
										{{
												comment.user_name != null
													? comment.user_name
													: comment.user != null
														? comment.user.name
														: 'Unknown'
										}}
									</h4>
									<SidebarItem :active="false" :href="
										route('comments.destroy', {
											comment: comment.id,
										})
									" :logout="true" as="button" method="delete" v-if="$page.props.auth.user">
										<TrashOutline></TrashOutline>
									</SidebarItem>
								</div>
								<div class="flex flex-row ml-8">
									<div class="block" v-text="comment.content"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div v-if="articles.length" class="sm:mx-4 lg:mx-0">
			<h1 class="mb-4 mx-4 sm:mx-0">Derniers articles publiés</h1>
			<!-- Articles -->
			<div class="mb-12 grid grid-cols-1 no-scrollbar gap-y-6 sm:gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
				<Article v-for="article in articles" :key="article.slug" :article="article"
					:show-image="article.banner != null"></Article>
			</div>
		</div>
	</FrontendLayout>
</template>
