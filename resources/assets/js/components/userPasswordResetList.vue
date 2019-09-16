<template>

    <div class="card">
        <div class="card-header">
           <div class="card-title mt-2">
                    User Reset Password
           </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover DataTable">
                   <thead>
                        <tr>      
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                   </thead>
                   <tbody>
                       <tr v-if="!this.getReset.length" >
                           
                          No Record Data 
                          
                       </tr>
                        <tr v-else v-for="getUser in getReset" :key="getUser.id">
                            <th>{{getUser.name}}</th>
                            <th>{{getUser.email}}</th>
                            <th>{{getUser.password}}</th>
                            <th>
                                <!-- <button class="btn btn-sm btn-primary all-btn" v-if="getUser.status == 1">Approved</button> -->
                                <button class="btn btn-sm btn-primary all-btn"  @click="approve(getUser.id)">Pedding</button>
                            </th>
                        </tr>
                   </tbody>

                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                getReset: []
            }
        },
        created() {
            this.axios
                .get('/api/getReset')
                .then(response => {
                    this.getReset = response.data;
                    //console.log(response.data);
                });
        },
        methods: {
            approve(id){
                this.axios.get(`/api/approve/${id}`)
                .then(response=>{
                    ajax.reload();
                })
            }
        }
    }
</script>