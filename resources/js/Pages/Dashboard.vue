<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Head } from '@inertiajs/inertia-vue3'
</script>

<template>

	<Head title="Dashboard" />

	<DashboardLayout>
		<div>	
			<div class="mx-auto">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						Dashboard
					</div>
				</div>
			</div>
		</div>
	</DashboardLayout>
</template>
