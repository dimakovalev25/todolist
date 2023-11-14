<template>
    <div class="mt-4">
        <form @submit.prevent="addTask" action="">

            <input v-model="task.name" class="rounded-xl border-2 border-black pl-2" type="text"
                   placeholder="add new task">
            <button class="text-gray-200 rounded-xl px-1 ml-2 bg-black shadow-xl border-black border-2">add task
            </button>

        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "AddTask",

    data() {
        return {
            task: {
                name: '',

            },

        }
    },
    methods: {
        addTask() {
            this.$emit('add_event', this.task);
            this.task.name = ''
        },

    }

}
</script>

<style scoped>


</style>