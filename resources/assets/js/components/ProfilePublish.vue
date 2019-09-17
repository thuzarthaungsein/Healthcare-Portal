
   <template>
            <div class="fullpage-container"> 
                <div class="button-group">
                        <button type="button" :class="{active:index ==0}" @click="moveTo(0)">first page</button>
                        <button type="button" :class="{active:index ==1}" @click="moveTo(1)">Second page</button>
                        <button type="button" :class="{active:index ==2}" @click="moveTo(2)">Third page</button>  
                        <button type="button" :class="{active:index ==3}" @click="moveTo(3)">Fourth page</button>            
                </div>
              
                <div class="fullpage-wp" v-fullpage="opts" ref="fullpage">
                    <div class="page-1 page">
                        <h1 class="part-1" >vue-fullpage.js</h1>
                       
                    </div>
                    <div class="page-2 page">
                        <h2 class="part-2" >Easy to use plugin</h2>
                    </div>
                    <div class="page-3 page">
                        <h2 class="part-3" >Working On Tablets</h2>
                        
                       
                    </div>
                   <div class="page-4 page">
                        <h1 class="part-4" >vue-fullpage.js</h1>
                       
                    </div>    
                </div>
            </div>
        </template>
   
 <script>
 export default {
  data() {
            var that = this;
            return {
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
    height: 800px;
    overflow: hidden;
}
</style>


    

    
    


    