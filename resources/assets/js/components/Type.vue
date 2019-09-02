<template>

<div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center">
                        <h4 style="padding-top: 20px;"> Type Create </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                         <div class="col-sm-1"></div>
                         <div class="col-sm-9">
                                <form @submit.prevent ="add" class="m-t-16">
                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="name"  ><strong> Name :</strong>  </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="name" class="form-control box" id="name"  name="name" v-model="Type.name"  required>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="description" ><strong> Parent :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select v-model="parent" class="form-control" @change='getParent()'>                        
                                                        <option v-for="parent in Parents" :key="parent.id" v-bind:value="parent.id">
                                                           {{parent.name}}
                                                        </option>
                                                    </select>
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-10">
      
                                                </div>
                                                <div class="col-sm-2">
                                                     <button class="btn news-post-btn">Create</button>
                                                </div>
                                        </div>                                                 
                                </form>
                           </div>
                            <div class="col-sm-2"></div>

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
                 Parents : [ { id: 0,name : 'None'},{ id: 1, name: 'Hospital' },{ id: 2, name: 'Nursing' }], 
                 Type: {
                        name: '',
                        parent:'',
                    },
                parent: 0
            }
        },
       
         methods: {
            add() {
                axios.post('http://localhost:8000/api/types/add', this.Type)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'facilitieslist'});
                    })
            },
             getParent: function(){
           
           this.Type.parent = this.parent;

           },
           
        }
             
}
</script>