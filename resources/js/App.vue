<template>
    <div class="px-10 py-12">
        <div class="text-3xl font-bold text-red-400">Todo List  <font-awesome-icon icon="fa-solid fa-user-secret" /></div>
        <AddTask></AddTask>
        <ListTask></ListTask>
    </div>
</template>

<script>
import AddTask from "@/vue/AddTask.vue";
import ListTask from "@/vue/ListView.vue";

export default {
    name: "App",
    components: {ListTask, AddTask}
}
</script>

<style scoped>

</style>