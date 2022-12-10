<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import SidebarItem from '@/Components/SidebarItem.vue'
import FlashMessage from '@/Components/FlashMessage.vue'
import Logout from '@/Components/Icons/Logout.vue'
import DashboardIcon from '@/Components/Icons/Dashboard.vue'
import ImageOutline from '@/Components/Icons/ImageOutline.vue'
import ArticleIcon from '@/Components/Icons/Article.vue'
import EmailOutline from '@/Components/Icons/EmailOutline.vue'
import BulbOutline from '@/Components/Icons/BulbOutline.vue'
import CloudUploadOutline from '@/Components/Icons/CloudUploadOutline.vue'
import useSwitchTheme from '@/Composables/switchTheme'

const { switchTheme } = useSwitchTheme()

const toggleTheme = () => switchTheme()
</script>

<template>
	<!-- Small screen -->
	<div class="h-screen flex items-center justify-center sm:hidden">
		<div class="flex flex-col items-center justify-center mx-8">
			<Link :href="route('home')"
				class="flex items-center justify-center w-full h-full text-3xl font-semibold text-primary-500 sm:w-auto">
			Taftadjani
			</Link>
			<p class="text-3xl font-medium leading-normal text-center mt-4 text-black-500 dark:text-white-500">
				Dashboard
				<span class="text-error-500 font-semibold">not supported</span>
				on small screen [
				<span class="text-error-500 font-semibold">width less or equal than 674px</span>
				]
			</p>
		</div>
	</div>

	<div class="h-screen hidden sm:flex sm:flex-row">
		<div class="flex flex-col justify-between items-start p-4">
			<!-- App logo -->
			<Link :href="route('home')"
				class="w-full flex items-center justify-center h-10 text-3xl font-semibold text-primary-500 sm:w-auto">
			TD
			</Link>

			<!-- Sidebar menu -->
			<div class="flex flex-col space-y-4">
				<!-- Dashboard -->
				<SidebarItem :active="route().current('dashboard')" :href="route('dashboard')">
					<DashboardIcon />
				</SidebarItem>

				<!-- Asset -->
				<SidebarItem :active="
					route().current('assets.index') ||
					route().current('assets.edit') ||
					route().current('assets.create')
				" :href="route('assets.index')">
					<ImageOutline />
				</SidebarItem>

				<!-- Article -->
				<SidebarItem :active="
					route().current('articles.index') ||
					route().current('articles.create') ||
					route().current('articles.edit')
				" :href="route('articles.index')">
					<ArticleIcon />
				</SidebarItem>

				<!-- Newsletter -->
				<SidebarItem :active="route().current('newsletters.index')" :href="route('newsletters.index')">
					<EmailOutline />
				</SidebarItem>
			</div>

			<!-- Logout -->
			<div>
				<SidebarItem :active="false" :href="route('logout')" :logout="true" as="button" method="post">
					<Logout />
				</SidebarItem>
			</div>
		</div>

		<div class="flex flex-col h-screen w-full py-4 overflow-hidden">
			<!-- Header -->
			<div class="flex flex-row justify-end items-center flex-shrink-0 w-full px-4 h-10">
				<div class="flex flex-row space-x-4 sm:order-last">
					<SidebarItem :active="false" :href="route('assets.create')">
						<CloudUploadOutline
							class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out"
							:class="{
								'fill-primary-500 dark:fill-primary-500':
									route().current('assets.create'),
							}" />
					</SidebarItem>

					<button @click="toggleTheme">
						<BulbOutline
							class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
					</button>
				</div>
			</div>

			<!-- Flash message -->
			<div v-if="$page.props.flash.success" class="flex flex-row justify-end items-center">
				<FlashMessage v-if="$page.props.flash.success" :body="$page.props.flash.success" type="success"
					class="my-2" />
			</div>

			<!-- Content -->
			<div class="overflow-auto no-scrollbar text-black-500 dark:text-white-500 py-12 px-4">
				<slot />
			</div>
		</div>
	</div>
</template>
