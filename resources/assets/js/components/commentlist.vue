<template>
 <div class="row">
     <div class="col-12">
         <div class="row m-b-15">
            <div class="col-md-12">
                <router-link class="float-right main-bg-color create-btn all-btn" style="color: blue;" to="/comment" ><i class="fas fa-plus-circle"></i> Create Comment</router-link>
            </div>
        </div>
    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style" style="height:700px;">
        <h4 class="main-color">Comment list Search</h4>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="comment" id="search-item" @keyup="searchComment()" >
            </div>
        </div>
        <hr>
        <h5 class="header">Comment List</h5>
        <div class="col-md-12 scrolldiv" style="height:525px;">
            <div class="container-fuid" v-for="comment in comments" :key="comment.id">
                <div class="card card-default m-b-20">
                    <div class="card-body">
                            <div class=" row col-md-10 ">
                                <div class="col-md-2 max-width16"><strong>Title :</strong></div><div class="col-md-10">{{comment.title}}</div>
                                <div class="col-md-2 max-width16"><strong>Comment :</strong></div><div class="col-md-10">{{comment.comment}}</div>
                                <div class="col-md-2 max-width16"><strong>Email :</strong></div><div class="col-md-10">{{comment.email}}</div>
                                <div class="col-md-2 max-width16"><strong>Name :</strong></div><div class="col-md-10">{{comment.name}}</div>
                            <div class="row col-12 mt-2">
                                <div class="col-4 col-offset-4 pl-3">
                                 <!-- <router-link  :to="{name: '/', params: { id: comment.id }}" class="btn confirm-borderbtn">Confirm</router-link> -->
                                  <button class="btn confirm-borderbtn" v-if="comment.status != 0">Confirmed</button>
                                <router-link to='/comment'  class="btn confirm-borderbtn" v-else @click="commentcomfirm(comment.id)">View</router-link>
                                <button class="btn delete-borderbtn" @click="deleteComment(comment.id)" >Delete</button>

                            </div>
                        </div>
                            </div>
                        </div>

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
         commentconfirm(id){
             this.axios.get(`/api/comments/confirm/${id}`)
                .then(response=>{
                    flash('Successfully Confirmed', 'success');
                    console.log(response.data);
                })
         },
    }
}
</script>


