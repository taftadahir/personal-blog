<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import FrontendLayout from '@/Layouts/FrontendLayout.vue'
import { onMounted } from '@vue/runtime-core'
import Article from '@/Components/Article.vue'
import Input from '@/Components/Input.vue'
import ValidationError from '@/Components/ValidationError.vue'
import Textarea from '@/Components/Textarea.vue'
import Button from '@/Components/Button.vue'
import CommentButton from '@/Components/CommentButton.vue'
import '@/prism.js'

onMounted(() => {
	Prism.highlightAll()
})

defineProps({
	article: Object,
	articles: Object,
})

const form = useForm({
	user_name: null,
	email: null,
	content: null,
})

const submit = () => {
	form.post(route('login'))
}
</script>

<template>

	<Head :title="article.title" />

	<FrontendLayout class="text-black-500 dark:text-white-50">
		<div class="flex flex-col items-center lg:flex-row justify-center lg:justify-center:space-x-10 sm:px-4 lg:px-0">
			<div class="w-full max-w-3xl">
				<!-- Title -->
				<h1 v-text="article.title" class="mx-4 sm:mx-0"></h1>

				<div>
					<!-- article details -->
					<div class="mx-4 sm:mx-0 mb-4">
						<span class="text-base text-white-600">Publié le {{ article.published_at }} - Durée de
							lecture : {{ article.read_time }} mins</span>
					</div>

					<!-- Banner & Summary -->
					<div class="mb-6">
						<img :src="'/storage/assets/' + article.banner.name" alt="Article Image" v-if="article.banner"
							class="block mb-4" />
						<summary v-if="article.excerpt" v-text="article.excerpt" class="mx-4 sm:mx-0 block"></summary>
					</div>

					<!-- Body -->
					<div v-html="article.content" v-if="article.content" class="content mb-12"></div>

					<!-- Comments -->
					<div class="comments space-y-12 mx-4 sm:mx-0 mb-12">
						<!-- Add comments -->
						<div>
							<div class="mb-4 w-full flex flex-row justify-between items-center">
								<h1 class="mb-0">Comments</h1>
							</div>
							<form class="space-y-4">
								<div
									class="w-full flex flex-col sm:flex-row justify-between items-start space-y-4 sm:space-y-0 sm:space-x-4">
									<div class="w-full sm:max-w-lg">
										<Input id="user_name" v-model="form.user_name" autocomplete="name" autofocus
											class="block w-full mt-2 p-4" placeholder="Fill your name" required
											type="text" />
										<ValidationError input="user_name" />
									</div>

									<div class="w-full sm:max-w-lg">
										<Input id="email" v-model="form.email" class="block w-full mt-2 p-4"
											placeholder="Fill your email" required type="text" />
										<ValidationError input="email" />
									</div>
								</div>
								<div class="w-full">
									<Textarea id="content" v-model="form.content" class="block w-full mt-2 p-4"
										name="content" placeholder="Fill the comment" rows="4" />
									<ValidationError input="content" />
								</div>
								<div class="flex flex-row justify-end w-full">
									<Button @click='submit'>Send</Button>
								</div>
							</form>
						</div>

						<!-- Existing comments -->
						<div v-if="article.comments" class="space-y-4">
							<div class="flex flex-col">
								<h4>Username</h4>
								<div class="flex flex-row">
									<CommentButton class="px-2 mr-12"></CommentButton>
									<p>
										Lorem ipsum dolor sit amet, consectetur
										adipiscing elit ut aliquam, purus sit
										amet luctus venenatis, lectus magna
										fringilla urna, porttitor rhoncus dolor
										purus non enim
									</p>
								</div>
								<div class="ml-20 mt-4">
									<h4>Username</h4>
									<div class="flex flex-row">
										<p class="ml-12">
											Lorem ipsum dolor sit amet,
											consectetur adipiscing elit ut
											aliquam, purus sit amet luctus
											venenatis, lectus magna fringilla
											urna, porttitor rhoncus dolor purus
											non enim
										</p>
									</div>
								</div>
							</div>
							<div class="flex flex-col">
								<h4>Username</h4>
								<div class="flex flex-row">
									<CommentButton class="px-2 mr-12"></CommentButton>
									<p>
										Lorem ipsum dolor sit amet, consectetur
										adipiscing elit ut aliquam, purus sit
										amet luctus venenatis, lectus magna
										fringilla urna, porttitor rhoncus dolor
										purus non enim
									</p>
								</div>
								<div class="ml-20 mt-4">
									<h4>Username</h4>
									<div class="flex flex-row">
										<p class="ml-12">
											Lorem ipsum dolor sit amet,
											consectetur adipiscing elit ut
											aliquam, purus sit amet luctus
											venenatis, lectus magna fringilla
											urna, porttitor rhoncus dolor purus
											non enim
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div v-if="articles.data.length" class="sm:mx-4 lg:mx-0">
			<h1 class="mb-4 mx-4 sm:mx-0">Derniers articles publiés</h1>
			<!-- Articles -->
			<div class="mb-12 grid grid-cols-1 no-scrollbar gap-y-6 sm:gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
				<Article v-for="article in articles.data" :key="article.slug" :article="article"
					:show-image="article.banner != null"></Article>
			</div>
		</div>
	</FrontendLayout>
</template>
