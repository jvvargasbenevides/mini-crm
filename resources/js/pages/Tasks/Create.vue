<script setup lang="ts">
import Layout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { route } from 'ziggy-js';

const form = useForm({
    title: '',
    description: '',
});

const CreateTask = () => {
    console.log(form)
    form.post(route('tasks.store'));
};
</script>

<template>
    <Layout>
        <Head title="Create" />
        <form @submit.prevent="CreateTask">
            <div>
                <div class="px-2 py-2">
                    <div class="py-2">
                        <Label>Título</Label>
                    </div>
                    <Input
                        id="title"
                        dusk="input-title"
                        type="text"
                        class="w-full"
                        v-model="form.title"
                        :errors="form.errors.title"
                        autofocus
                        required
                    />
                </div>
                <div class="px-2 py-2">
                    <div class="py-2">
                        <Label>Descrição</Label>
                    </div>
                    <Input
                        id="description"
                        dusk="input-description"
                        type="text"
                        class="w-full"
                        v-model="form.description"
                        :errors="form.errors.description"
                        autofocus
                        required
                    />
                </div>
            </div>
        <div class="px-2">
            <Button>Criar</Button>
        </div>
        </form>
    </Layout>
</template>
