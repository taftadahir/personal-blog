<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Input from '@/Components/Input.vue'
import Button from '@/Components/Button.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const form = useForm({
	email: '',
	password: '',
	remember: false,
})

const submit = () => {
	form.post(route('login'), {
		onFinish: () => form.reset('password'),
	})
}
</script>

<template>
	<GuestLayout>

		<Head title="Log in" />

		<form @submit.prevent="submit" class="space-y-6">
			<Input type="email" class="block w-full" v-model="form.email"
								placeholder="Entrez votre email" required
				autofocus autocomplete="username" />

			<Input type="password" class="block w-full" v-model="form.password"
								placeholder="Entrez votre mot de passe"
				required autocomplete="current-password" />

			<div class="flex items-center justify-end mt-4">
				<Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
					Se connecter
				</Button>
			</div>
		</form>
	</GuestLayout>
</template>
