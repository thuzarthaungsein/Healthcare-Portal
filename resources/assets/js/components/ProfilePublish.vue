
   <template>
            <div class="fullpage-container" style="height:200vh;"> 
                <div class="button-group">
                        <button type="button" :class="{active:index ==0}" @click="moveTo(0)">Equipment</button>
                        <button type="button" :class="{active:index ==1}" @click="moveTo(1)">Map</button>
                        <button type="button" :class="{active:index ==2}" @click="moveTo(2)">Preview</button>  
                         
                </div>
              
                <div class="fullpage-wp" v-fullpage="opts" ref="fullpage">
                    <div class="page-1 page">
                        <h1><u>Facility</u></h1>
 
                    </div>
                    <div class="page-2 page">
                        <h2 class="part-2" >Easy to use plugin</h2>
                    </div>
                    <div class="page-3 page">
                        <h2 class="part-3" >Working On Tablets</h2> 
                    </div>
                  
                </div>
            </div>
        </template>
   
 <script>
 export default {
  data() {
            var that = this;
            return {   
                facilities:[],
                cooperate_medical:[],
                medical_acceptance:[],
                index: 0,
                pageNum: 0,
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration: 500,
                    beforeChange: function(ele, current, next) {
                        console.log('before', current, next)
                        that.index = next;
                    },
                    afterChange: function(ele, current) {
                        that.index = current;
                        console.log('after', current)
                    }
                }
            };
        },
         created(){
                    this.axios.get('/api/getnusfacilities').then(response => {
                        this.facilities = response.data;       
                    });
                    
         },
        methods: {
            moveTo: function(index) {          
                this.$refs.fullpage.$fullpage.moveTo(index, true);
            }
           
        }
 }
       
</script>

<style scoped>
.fullpage-container {
    position: relative;
    width: 100%;
    min-height: 800px;
    overflow: hidden;
    
}

.page-container {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
}

</style>




    

    
    


    