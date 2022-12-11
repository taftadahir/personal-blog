<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import TrashOutline from '@/Components/Icons/TrashOutline.vue'
import ValidationError from '@/Components/ValidationError.vue'
import SidebarItem from '@/Components/SidebarItem.vue'

const props = defineProps({
	asset: Object,
})

const form = useForm({
	file_name: props.asset.file_name,
	original_name: props.asset.original_name,
	extension: props.asset.extension,
})
</script>

<template>

	<Head title="Edit asset" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full mt-6">
			<div class="flex flex-row items-center justify-between mb-6">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					Update asset
				</h1>

				<div class="flex flex-row space-x-4">
					<SidebarItem :active="false" :href="route('logout')" :logout="true" as="button" method="post">
						<TrashOutline></TrashOutline>
					</SidebarItem>
				</div>
			</div>

			<div class="h-full">
				<form class="flex flex-row space-x-6 mb-6">
					<div class="flex flex-col items-start space-y-4 min-w-[28rem] max-w-lg">
						<div class="w-full">
							<Label for="file_name" value="File name" />
							<Input id="title" v-model="form.file_name" autofocus class="block w-full mt-2 p-4"
								placeholder="Fill the file name" readonly type="text" />
						</div>

						<div class="w-full">
							<Label for="original_name" value="Original name" />
							<Input id="original_name" v-model="form.original_name" class="block w-full mt-2 p-4"
								placeholder="Fill the original name" readonly type="text" />
						</div>

						<div class="w-full">
							<Label for="extension" value="extension" />
							<Input id="extension" v-model="form.extension" readonly class="block w-full mt-2 p-4"
								placeholder="Fill the extension" type="text" />
						</div>
					</div>

					<div class="w-full h-full">
						<Label for="file" value="Preview" />
						<img :src="'/storage/assets/' + form.file_name" alt="Asset Image" class="w-full aspect-video" />
					</div>
				</form>
			</div>
		</div>
	</DashboardLayout>
</template>
