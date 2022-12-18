<script setup>
import { ref } from 'vue'
import Close from '@/Components/Icons/Close.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import Input from '@/Components/Input.vue'
import Button from '@/Components/Button.vue'

const open = ref(false)

const form = useForm({
	email: null,
})

const submit = () => {
	form.post(route('newsletters.store'))
}
</script>

<template>
	<div class="relative w-full sm:w-auto">
		<div @click="open = !open" class="w-full sm:w-auto">
			<slot name="trigger" />
		</div>

		<div v-show="open" class="fixed inset-0 z-40 bg-white-50 dark:bg-black-500 p-4">
			<div class="flex flex-row justify-end">
				<Close @click="open = false" class="cursor-pointer fill-error-500"></Close>
			</div>

			<div class="h-full flex flex-col justify-center items-center">
				<div class="w-full flex flex-col justify-start max-w-5xl space-y-4">
					<p class="font-semibold text-xl text-black-500 dark:text-white-50">
						Abonnez-vous à notre newsletter
					</p>

					<form class="flex flex-row bg-primary-500 w-full">
						<Input type="email" class="block w-full p-4" placeholder="Entrez votre email"
							v-model="form.email" required autofocus />
						<Button @click="submit">S'abonner</Button>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>
