<template>
    <div>

        <div>
            <div class="overflow-x-auto rounded-lg border border-gray-200 mt-4">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <tbody class="divide-y divide-gray-200 ">
                    <tr class="mt-2" v-for="(item, i) in props.taskList">
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            {{ item.name }}
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ item.formatted_created_at }}</td>

                        <td :class="{'text-green-500': item.completed, 'text-red-500' :!item.completed}"
                            class="whitespace-nowrap px-4 py-2 text-gray-700">
                            {{ item.completed ? 'Completed' : 'not completed' }}
                        </td>

                        <button class="border-2 px-1 rounded-xl bg-green-400 mr-6">complete</button>

                        <button @click.prevent="deleteTask(item.id )" class="border-2 px-1 mt-2 rounded-xl bg-red-400 mr-6">delete</button>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
    setup(props, { emit }) {
        const deleteTask = (id) => {
            emit('delete_task', id);
        };

        return {
            props, deleteTask
        };
    }
}
</script>