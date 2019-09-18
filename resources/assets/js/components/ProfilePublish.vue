<template>
            <div class="fullpage-container" style="height: 150vh;">
                <div class="button-group">
                        <button type="button" :class="{active:index ==0}" @click="moveTo(0)">Information</button>
                        <button type="button" :class="{active:index ==1}" @click="moveTo(1)">Features</button>
                        <button type="button" :class="{active:index ==2}" @click="moveTo(2)">Cost</button>
                </div>

                <div class="fullpage-wp" v-fullpage="opts" ref="fullpage">
                    <div class="page-1 page">
                        <h1 class="part-1" >Information</h1>
                            <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id">
                            {{nurseprofile.special_features}}
                        </div>

                    </div>
                    <div class="page-2 page">
                        <h2 class="part-2" >Features</h2>
                        <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id">
                            {{nurseprofile.feature}}
                        </div>

                    </div>
                    <div class="page-3 page">
                        <h2 class="part-3" >Cost</h2>
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
                nursing_profiles:[],
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration:1000,
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
        this.axios
                .get('/api/nurse')
                .then(response => {
                    this.nursing_profiles = response.data;
                    console.log(this.nursing_profiles);
                });
    },
        methods: {
            moveTo: function(index) {

                this.$refs.fullpage.$fullpage.moveTo(index, true);
            },
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








