<script setup>
import ArrowUpwardOutline from '@/Components/Icons/ArrowUpwardOutline.vue'
import BulbOutline from '@/Components/Icons/BulbOutline.vue'
import DashboardIcon from '@/Components/Icons/Dashboard.vue'
// import LogInOutline from '@/Components/Icons/LogInOutline.vue'
import SidebarItem from '@/Components/SidebarItem.vue'
import useSwitchTheme from '@/Composables/switchTheme'
function goUp() {
	window.scrollTo(0, 0)
}
const { switchTheme } = useSwitchTheme()
const toggleTheme = () => switchTheme()
</script>

<template>
	<footer class="w-full bg-primary-50 dark:bg-black-600 px-4 lg:px-0">
		<div
			class="max-w-5xl w-full mx-auto flex flex-col items-center sm:flex-row sm:justify-between sm:h-20 py-4 sm:py-0">
			<div class="flex flex-row space-x-4 sm:order-last">
				<!-- <SidebarItem :active="false" :href="route('login')" v-if="!$page.props.auth.user"> -->
				<!-- 	<LogInOutline></LogInOutline> -->
				<!-- </SidebarItem> -->

				<SidebarItem :active="false" :href="route('dashboard')" v-if="$page.props.auth.user">
					<DashboardIcon />
				</SidebarItem>

				<button @click="toggleTheme">
					<BulbOutline
						class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
				</button>

				<button @click="goUp">
					<ArrowUpwardOutline
						class="fill-primary-500 dark:fill-primary-500 hover:fill-primary-700 hover:dark:fill-primary-700 transition duration-150 ease-in-out" />
				</button>
			</div>

			<div class="font-medium text-sm flex items-center text-white-600 mt-4 sm:mt-0">
				<span class="mr-4">Taftadjani © 2022</span>
			</div>
		</div>
	</footer>
</template>
