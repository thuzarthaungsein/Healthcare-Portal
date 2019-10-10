<template>
   <div class="row">
     <div class="col-12">
         <!-- <div class="row m-b-15">
            <div class="col-md-12">
                <router-link class="float-right main-bg-color create-btn all-btn" style="color: blue;" to="/comment" ><i class="fas fa-plus-circle"></i> Create Comment</router-link>
            </div>
        </div> -->
    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <h4 class="main-color">Comment list Search</h4>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="comment" id="search-item" @keyup="searchComment()" >
            </div>
        </div>
        <hr>
        <h5 class="header">Comment List</h5>
        <div class="col-md-12 scrolldiv">
              <div v-if="!this.comments.length"  class="container-fuid" style="padding-top:30px; height:700px; text-align:center ">

                          No Record Data

                 </div>
            <div v-else class="container-fuid" v-for="comment in comments" :key="comment.id">
                <div class="card card-default m-b-20">
                    <div class="card-body">
                            <div class=" row">
                                <div class="col-md-8 m-t-8">
                                    <strong>Title :</strong> {{comment.title}}
                                </div>
                                <div class="col-md-4 ">
                                    <button class="btn edit-borderbtn" type="button" data-toggle="collapse" :data-target="'#showDetails' + comment.id" >View</button>
                                    <!-- <button class="btn edit-borderbtn" @click="show(comment.id)">View</button> -->
                                    <button class="btn confirm-borderbtn confirmed"  v-if="comment.status != 0" >Confirmed</button>
                                    <button class="btn confirm-borderbtn" v-else @click="commentConfirm(comment.id)">Confirm</button>
                                    <button class="btn delete-borderbtn" @click="deleteComment(comment.id)" >Delete</button>

                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="collapse card-body" :id="'showDetails' + comment.id">
                                <!-- <div class="col-md-10 m-t-8 "><strong>Title :</strong>{{comment.title}}</div>
                                <div class="col-md-12  "><strong>Comment :</strong>{{comment.comment}}</div>
                                <div class="col-md-10 m-t-8 "><strong>Email :</strong>{{comment.email}}</div>
                                <div class="col-md-10 m-t-8"><strong>Name :</strong>{{comment.name}}</div> -->
                                <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:30%">Title : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{comment.title}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Comment :</td>
                                                        <td style="width:70%"><div class="col-md-12  ">{{comment.comment}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Email :</td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{comment.email}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Name :</td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{comment.name}}</div></td>
                                                </tr>
                                </table>

                         </div>



                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            comments:[]
        }
    },
    created(){
        this.axios
                .get('/api/comments/comment')
                .then(response => {
                    this.comments = response.data;


                });
    },

    methods: {
            deleteComment(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                    this.axios
                    .delete(`/api/comments/delete/${id}`)
                    .then(response => {

                        alert('Delete Successfully!');
                        let a = this.comments.map(item => item.id).indexOf(id);
                        this.comments.splice(a, 1)
                    });
            }
         },
         commentConfirm(id){
             if(confirm("Are you sure you want to confirm?"))
             {
                 this.axios.get(`/api/comments/comfirm/${id}`)
                .then(response=>{
                    this.comments = response.data.comments;
                     alert('Successfully Confirm!');
                    //console.log(this.comments);
                })
             }

         }

    }
}
</script>


