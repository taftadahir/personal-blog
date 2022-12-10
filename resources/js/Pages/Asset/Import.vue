<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import ValidationError from '@/Components/ValidationError.vue'

const form = useForm({
	asset: null,
})

const submit = () => {
	form.post(route('articles.store'))
}
</script>

<template>

	<Head title="Import asset" />

	<DashboardLayout>
		<div class="flex flex-col mx-auto w-full mt-6">
			<div class="flex flex-row items-center justify-between mb-6">
				<h1 class="text-black-500 dark:text-white-50 font-semibold text-3xl">
					Import asset
				</h1>

				<Button @click="submit">Save</Button>
			</div>

			<div class="h-full">
				<form>
					<div class="w-full">
						<Label for="asset" value="Asset" />
						<input type="file" @input="form.asset = $event.target.files[0]"
							class="block w-full text-sm text-black-900 border border-black-300 cursor-pointer bg-primary-50 focus:outline-none dark:bg-black-600 dark:border-black-600 dark:placeholder-black-600 px-4 py-2" />
						<ValidationError input="asset" />
					</div>
				</form>
			</div>
		</div>
	</DashboardLayout>
</template>
