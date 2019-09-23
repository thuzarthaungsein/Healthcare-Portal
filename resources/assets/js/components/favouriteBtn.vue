<template> 
<div id="app">
  <h2>Favourite Testing</h2>
  <form @submit.prevent="favList" class="col-md-12">
  <button class="btn btn-success">Favourite</button>
  </form>
</div>
</template>

<script>
export default {
 created(){
            
        },
methods:{
    favList(){
        let favData = localStorage.getItem('hospital_fav');        
         this.axios.post('/api/hospital/favData', favData)
                    .then(response => { 
                        //  console.log(response);
                    })

       }
}
    }
</script>