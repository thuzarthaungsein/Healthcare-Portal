<template>
        <div class="m-lr-0 justify-content-md-center">
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                         
                    </div>
                </div>
            </div>
            
        </div>
</template>

<script>

export default {
        data() {
            return {
               news_arr:[]
            }
        },
        created() {
            var search_word = $('#search-word').val();
            this.axios
                .post('/api/news/search/'+search_word)
                .then(response=>{
                        this.news_arr = response.data;
                });
        }

}

 </script>
