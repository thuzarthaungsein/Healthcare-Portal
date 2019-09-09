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
            
                 console.log('local',localStorage.getItem('hospital_fav'))
        },
methods:{
    favList(){
        let favData = localStorage.getItem('hospital_fav');        
         axios.post('http://localhost:8000/api/hospital/favData', favData)
                    .then(response => { 
                         console.log(response);
                    })

       }
}
    }
</script>