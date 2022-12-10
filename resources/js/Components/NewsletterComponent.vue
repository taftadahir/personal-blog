<script setup>
import SidebarItem from '@/Components/SidebarItem.vue'
import TrashOutline from '@/Components/Icons/TrashOutline.vue'

const props = defineProps({
	newsletter: {
		type: Object,
		required: true,
	},
	isEven: {
		type: Boolean,
		default: false,
	},
})
</script>

<template>
	<div class="flex flex-row justify-between items-center py-2 px-4"
		:class="{ 'bg-primary-50 dark:bg-black-600': isEven }">
		<p>
			{{ newsletter.email }}
		</p>

		<SidebarItem :active="false" :href="route('logout')" :logout="true" as="button" method="post">
			<TrashOutline class=""></TrashOutline>
		</SidebarItem>
	</div>
</template>
