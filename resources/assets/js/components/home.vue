<template>
    <div>
        <!-- <adsSlider></adsSlider> -->
        <!--menu tabs-->
        <ul class="nav nav-tabs news-tabColor" id="navtab">
            <li role="presentation" class="subtab1 nav-item">
                <router-link  :to="{ name: 'News' }" @click="changeRoute('news')" class="nav-link"><i class="fas fa-newspaper"></i> ニュース</router-link>
            </li>
            <li role="presentation" class="subtab3 nav-item">
                <router-link :to="{ name: 'nursingSearch' }" @click="changeRoute('nursing')" class="nav-link"><i class="fas fa-user-md"></i> 介護施設検索</router-link>
            </li>
            <li role="presentation" class="subtab2 nav-item">
                <router-link  :to="{ name: 'hospital_search' }" @click="changeRoute('hospital')" class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院検索</router-link>
            </li>
            <li role="presentation" class="subtab5 nav-item">
                <router-link  :to="{ name: 'jobSearch' }" @click="changeRoute('job')" class="nav-link"><i class="fas fa-users"></i> 求人検索</router-link>
            </li>
        </ul>
        <main>
            <slot />
        </main>
        <div class="tab-content tab-content1 tabs upper-tab" id="upper-tab">
        <div class="tab-pane" id="tab1">
                
        </div>
              
        </div>
        <!--end menu tabs-->
    </div>
    <!-- {{ l_storage_hos_history }} -->
</template>

<script>


    // import ProfilePublish from './ProfilePublish.vue'

    export default {

        methods: {


            changeRoute(tab) {
                console.log(tab)
                $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');
                $('#navtab').addClass(tab + '-tabColor');
                $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');
                $('#upper-tab').addClass(tab + '-borderColor');
                // console.log(e.target.tagName);
                //this.$router.push({name:'home'});
            },
        }

    }
</script>

<style>
    .hospital-tabColor .nav-link {
        background: #63b7ff !important;
        color: #fff;
        border-right: 1px solid #fff;
    }

    .news-tabColor .nav-link {
        background: #75b777 !important;
        color: #fff;
        border-right: 1px solid #fff;
    }

    .nursing-tabColor .nav-link {
        background: #ff9563 !important;
        color: #fff;
        border-right: 1px solid #fff;
    }

    .job-tabColor .nav-link {
        background: #828282 !important;
        color: #fff;
        border-right: 1px solid #fff;
    }

    .job-borderColor {
        border: 1px solid #828282 !important;
    }

    .news-borderColor {
        border: 1px solid #75b777 !important;
    }

    .hospital-borderColor {
        border: 1px solid #63b7ff !important;
    }

    .nursing-borderColor {
        border: 1px solid #ff9563 !important;
    }
</style>


