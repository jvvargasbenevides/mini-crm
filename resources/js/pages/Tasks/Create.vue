<script setup lang="ts">
import Layout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { route } from 'ziggy-js';
import type { BreadcrumbItem } from '@/types';

const form = useForm({
    title: '',
    description: '',
});

const CreateTask = () => {
    console.log(form);
    form.post(route('tasks.store'));
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tarefas',
        href: '#',
    },
];
</script>

<template>
    <Layout :breadcrumbs="breadcrumbs">
        <Head title="Criar tarefa" />

        <div class="flex justify-center py-10">
            <div
                class="w-full max-w-xl rounded-xl border border-gray-200 bg-white shadow-md"
            >
                <!-- Header -->
                <div class="border-b px-6 py-4">
                    <h1 class="text-lg font-semibold text-gray-800">
                        Criar nova tarefa
                    </h1>
                    <p class="text-sm text-gray-500">
                        Preencha os dados abaixo para adicionar uma nova tarefa
                    </p>
                </div>

                <!-- Form -->
                <form @submit.prevent="CreateTask" class="space-y-6 px-6 py-6">
                    <!-- Título -->
                    <div class="space-y-2">
                        <Label for="title">Título</Label>
                        <Input
                            id="title"
                            dusk="input-title"
                            type="text"
                            class="w-full"
                            v-model="form.title"
                            :errors="form.errors.title"
                            placeholder="Ex: Finalizar relatório"
                            autofocus
                            required
                        />
                    </div>

                    <!-- Descrição -->
                    <div class="space-y-2">
                        <Label for="description">Descrição</Label>
                        <Input
                            id="description"
                            dusk="input-description"
                            type="text"
                            class="w-full"
                            v-model="form.description"
                            :errors="form.errors.description"
                            placeholder="Detalhes da tarefa"
                            required
                        />
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end gap-3 border-t pt-4">
                        <Button
                            type="submit"
                            class="px-6"
                            :disabled="form.processing"
                        >
                            Criar tarefa
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
