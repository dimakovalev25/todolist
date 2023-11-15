<template>
    
    <!--    <div class="mt-2 flex space-x-4 rounded-xl border-2" v-for="(item, i) in props.taskList" :key="i">
            <div :class="{'text-green-500': item.completed}" class="flex-1  p-4  text-gray-900">
                <p class="whitespace-normal  font-medium"> {{ item.name }}</p>
    
            </div>
    
            <div class="flex-1 p-4 font-medium text-gray-900 text-gray-700">{{ item.formatted_created_at }}</div>
    
            <div :class="{'text-green-500': item.completed, 'text-red-500': !item.completed}"
                 class="flex-1 p-4 font-medium text-gray-900 text-gray-700">
                {{ item.completed ? 'Completed' : 'Not completed' }}
            </div>
    
            <div class="flex-1 p-4 font-medium text-gray-900">
                <button @click.prevent="completeTask(item.id)" class="border-2 rounded-xl bg-green-400 h-[2rem] mr-6">
                    Complete
                </button>
                <button @click.prevent="deleteTask(item.id)" class="border-2 rounded-xl bg-red-400 h-[2rem] mr-6">Delete
                </button>
            </div>
        </div>-->


    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    ToDo
                </th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    Date
                </th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    isComplete
                </th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    Action
                </th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

            <tr v-for="(item, i) in props.taskList" :key="i">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 max-w-5xl break-all truncate">
                    {{ item.name }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ item.formatted_created_at }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {{ item.completed ? 'Completed' : 'Not completed' }}
                </td>

                <td class="whitespace-nowrap px-4 py-2">
                    <button @click.prevent="completeTask(item.id)"
                            class="border-2 rounded-xl bg-green-400 h-[2rem] mr-6">
                        Complete
                    </button>
                    <button @click.prevent="deleteTask(item.id)"
                            class="border-2 rounded-xl bg-red-400 h-[2rem] mr-6">Delete
                    </button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<!--<script>
import axios from "axios";

export default {
    name: "ListView",
    props: ['taskList'],

   
}
</script>-->

<script>
export default {
    props: ['taskList'],
    setup(props, {emit}) {
        const deleteTask = (id) => {
            emit('delete_task', id);
        };
        const completeTask = (id) => {
            emit('complete_task', id);
        };

        return {
            props, deleteTask, completeTask
        };
    }
}
</script>