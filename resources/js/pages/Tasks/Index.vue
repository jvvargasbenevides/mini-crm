<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import Layout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { dashboard } from '@/routes';

interface Task {
    id: number;
    title: string;
    description?: string;
    status: boolean;
}

const { tasks } = defineProps<{
    tasks: Task[];
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tarefas',
        href: '#',
    },
];
</script>

<template>
    <Head title="Tarefas" />
    <Layout :breadcrumbs="breadcrumbs">
        <div class="px-6 py-6">
            <!-- Header -->
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Tarefas</h1>

                <Link
                    class="rounded-lg bg-black px-4 py-2 font-semibold text-white transition hover:bg-gray-800"
                    :href="route('tasks.create')"
                >
                    + Criar tarefa
                </Link>
            </div>

            <!-- Lista de tarefas -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="task in tasks"
                    :key="task.id"
                    class="rounded-xl border border-gray-200 bg-gray-100 p-5 shadow-sm transition hover:shadow-md"
                >
                    <!-- Título -->
                    <h2 class="mb-2 text-lg font-semibold text-gray-900">
                        {{ task.title }}
                    </h2>

                    <!-- Descrição -->
                    <p class="mb-4 text-sm text-gray-600">
                        {{ task.description }}
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between">
                        <!-- Status -->
                        <span
                            class="rounded-full px-3 py-1 text-xs font-medium"
                            :class="{
                                'bg-green-100 text-green-700':
                                    task.status === 'concluida',
                                'bg-yellow-100 text-yellow-700':
                                    task.status === 'pendente',
                                'bg-red-100 text-red-700':
                                    task.status === 'cancelada',
                            }"
                        >
                            {{ task.status }}
                        </span>

                        <!-- ID ou ações -->
                        <span class="text-xs text-gray-400">
                            #{{ task.id }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.task-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    font-family: Arial, Helvetica, sans-serif;
}

.task-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.task-header h1 {
    margin: 0;
}

.task-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.task-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-bottom: 12px;
    background: #fff;
}

.task-item.done {
    opacity: 0.6;
    text-decoration: line-through;
}

.task-info h3 {
    margin: 0 0 4px;
}

.task-info p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.task-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.status {
    font-size: 13px;
    font-weight: bold;
}

.btn-primary {
    padding: 8px 14px;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-edit {
    background: #facc15;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-delete {
    background: #ef4444;
    color: #fff;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
}
</style>
