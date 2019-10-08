<template>
    <div class="row">
      <div class="col-12">
           <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="main-color">ニュース記事を検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row m-b-15">
                    <div class="col-md-12">
                         <!-- <router-link class="float-leftbtn btn main-bg-color white all-btn" style="color: blue;" to="/occupation" >戻る</router-link> -->
                        <router-link class="float-right" style="color: blue;" to="/occupation" >  Create New Occupation</router-link>
                    </div>

                </div>


        <div class="col-md-12 scrolldiv">
            <div v-if="!this.occupation.length" class="container-fuid" style="padding-top:30px; height:700px; text-align:center ">

                    No record data

            </div>
            <div class="container-fuid" v-for="occupations in occupation" :key="occupations.id">
                <div class="card card-default m-b-20">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 m-t-8">
                                 <p> {{occupations.name}} </p>
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">

                                  <router-link :to="{name: 'occupation', params: { id: occupations.id }}" class="btn main-bg-color white all-btn">編集 </router-link>

                                <button class="btn btn-danger all-btn" @click="deleteType(occupations.id)">削除</button>
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
          data() {
            return {
                occupation: []
            }
        },
        created() {
            this.axios
                .get('/api/occupation/type')
                .then(response => {
                    this.occupation = response.data;
                });
        },
         methods: {

               deleteType(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/occupation/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.occupation.map(item => item.id).indexOf(id); // find index of your object
                        this.occupation.splice(i, 1)
                    });
                }

            }

        }
}
</script>
