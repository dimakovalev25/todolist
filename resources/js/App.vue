<template>
    <div class="px-10 py-12">
        <div class="text-3xl font-bold text-red-400">Todo List
            <font-awesome-icon icon="fa-solid fa-user-secret"/>

        </div>
        <AddTask @add_event="approveTask"></AddTask>
        <div>
        
        <ListTask @delete_task="deleteTask" :taskList="taskList"></ListTask>       </div>
    </div>
</template>

<script>
import AddTask from "@/vue/AddTask.vue";
import ListTask from "@/vue/ListView.vue";
import axios from "axios";

export default {
    name: "App",
    components: {ListTask, AddTask},
  

    data() {
        return {
            'taskList': []
        }
    },

    mounted() {
        this.getTasks()
       
    },

    methods: {
        async getTasks() {
            try {
                const res = await  axios.get('/api/items')
                this.taskList = res.data.items;
                // console.log(this.taskList)
            } catch (error) {
                console.log(error)
            }
        },
        
        approveTask(data) {
            this.addTask(data)
            this.getTasks()
        },

        addTask(data){
                axios.post('/api/item/store', data)
                .then(res => {
                    console.log(res)
                })
                .catch(err => {
                    console.log(err)
                })
        },

        
        deleteTask(id){
            axios.delete(`/api/item/${id}`, id)
                .then(res => {
                    console.log(id)
                    this.getTasks()
                })
                .catch(err => {
                    console.log(err)
                })
        }
        

    }
}
</script>

<style scoped>

</style>