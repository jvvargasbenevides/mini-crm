<script setup lang="ts">
import {
    Stepper,
    StepperDescription,
    StepperIndicator,
    StepperItem,
    StepperSeparator,
    StepperTitle,
    StepperTrigger,
} from '@/components/ui/stepper';
import { BookUser, CreditCard, Truck } from 'lucide-vue-next';

type TaskStatus = 'pending' | 'parcial' | 'revision' | 'completed';

interface Task {
    id: number;
    title: string;
    description?: string;
    status: string;
}

const steps = [
    {
        step: 1,
        title: 'Pending',
        icon: BookUser,
    },
    {
        step: 2,
        title: 'Parcial',
        icon: Truck,
    },
    {
        step: 3,
        title: 'Revision',
        icon: CreditCard,
    },
    {
        step: 4,
        title: 'Completed',
    },
];

const { task } = defineProps<{
    task: Task;
}>();

if (task.status === 'pending') {
    s;
}
</script>

<template>
    <Stepper class="flex w-10/12 items-start gap-2">
        <StepperItem
            v-for="item in steps"
            :key="item.step"
            :step="item.step"
            class="relative flex w-full flex-col items-center justify-center"
        >
            <StepperTrigger>
                <StepperIndicator v-slot="{ step }" class="bg-muted">
                    <template v-if="item.icon">
                        <component :is="item.icon" class="h-4 w-4" />
                    </template>
                    <span v-else>{{ step }}</span>
                </StepperIndicator>
            </StepperTrigger>
            <StepperSeparator
                v-if="item.step !== steps[steps.length - 1]?.step"
                class="absolute top-5 right-[calc(-50%+10px)] left-[calc(50%+20px)] block h-0.5 shrink-0 rounded-full bg-muted group-data-[state=completed]:bg-primary"
            />
            <div class="flex flex-col items-center">
                <StepperTitle>
                    {{ item.title }}
                </StepperTitle>
            </div>
        </StepperItem>
    </Stepper>
</template>
