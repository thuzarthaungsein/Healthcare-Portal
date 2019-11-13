<template>
    <div>
        <!-- <adsSlider></adsSlider> -->
        <!--menu tabs-->
        <ul class="nav nav-tabs news-tabColor navtab" id="navtab">
            <li role="presentation" class="subtab1 nav-item">
                <router-link  :to="{ name: 'News' }"  class="nav-link"><i class="fas fa-newspaper"></i> ニュース</router-link>
            </li>
            <li role="presentation" class="subtab2 nav-item"  >
                <router-link :to="{ name: 'nursingSearch' }"  class="nav-link"><i class="fas fa-user-md"></i> 介護施設検索</router-link>
            </li>
            <li role="presentation" class="subtab3 nav-item"  >
                <router-link  :to="{ name: 'hospital_search' }"  class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院検索</router-link>
            </li>
            <li role="presentation" class="subtab4 nav-item"  >
                <router-link  :to="{ name: 'jobSearch' }"  class="nav-link"><i class="fas fa-users"></i> 求人検索</router-link>
            </li>
        </ul>
        
        <div class="tabs upper-tab" id="upper-tab">
            <div class="tab-pane" id="tab1">
                    <main>
                        <slot />
                    </main>
            </div>
        </div>
        <!--end menu tabs-->
    </div>
    <!-- {{ l_storage_hos_history }} -->
</template>

<style>
    .hospital-tabColor .nav-link {
        background: #63b7ff !important;
        color: #fff;
        border-right: 1px solid #fff;
        border-bottom: 0px;
    }
    .hospital-tabColor li.subtab3 > .router-link-active{
        background: #fff!important;
        color: #63b7ff !important;
        border-bottom-color: transparent !important;
        border-top: 3px solid #63b7ff !important;
        border-bottom: 0px !important;
        /* border-left: 1px solid #63b7ff !important; */
    }
    .hospital-tabColor li.subtab3 > .router-link-exact-active>i.fa, .hospital-tabColor li.subtab3 > .router-link-active>i.fas {
        color: #63b7ff !important;
    }

    .news-tabColor .nav-link {
        background: #75b777 !important;
        color: #fff;
        border-right: 1px solid #fff;
        border-bottom: 0px !important;
    }
    .news-tabColor li.subtab1 > .router-link-active{
        background: #fff!important;
        color: #75b777 !important;
        border-bottom-color: transparent !important;
        border-top: 3px solid #75b777 !important;
        border-left: 1px solid #75b777 !important;
        border-bottom: 0px !important;
    }
    .news-tabColor li.subtab1 > .router-link-exact-active>i.fa, .news-tabColor li.subtab1 > .router-link-active>i.fas {
        color: #75b777 !important;
    }

    .nursing-tabColor .nav-link {
        background: #ff9563 !important;
        color: #fff;
        border-right: 1px solid #fff;
        border-bottom: 0px !important;
    }
    .nursing-tabColor li.subtab2 > .router-link-active{
        background: #fff!important;
        color: #ff9563 !important;
        border-bottom-color: transparent !important;
        border-top: 3px solid #ff9563 !important;
        border-bottom: 0px !important;
        /* border-left: 1px solid #ff9563 !important; */
    }
    .nursing-tabColor li.subtab2 > .router-link-exact-active>i.fa, .nursing-tabColor li.subtab2 > .router-link-active>i.fas {
        color: #ff9563 !important;
    }


    .job-tabColor .nav-link {
        background: #828282 !important;
        color: #fff;
        border-right: 1px solid #fff;
        border-bottom: 0px !important;
    }
    .job-tabColor li.subtab4 > .router-link-active{
        background: #fff!important;
        color: #828282 !important;
        border-bottom-color: transparent !important;
        border-top: 3px solid #828282 !important;
        /* border-left: 1px solid #828282 !important; */
        border-right: 1px solid #828282 !important;
        border-bottom: 0px !important;
    }
    .job-tabColor li.subtab4 > .router-link-exact-active>i.fa, .job-tabColor li.subtab4 > .router-link-active>i.fas {
        color: #828282 !important;
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
    .tab-pane{
        padding: 10px;
    }
</style>


