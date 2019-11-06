<template>
    <div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <router-link class="nav-item" :to="{ name: 'News' }"><i class="fas fa-newspaper"></i> ニュース</router-link>
                    <router-link class="nav-item" :to="{ name: 'nursingSearch' }"><i class="fas fa-user-md"></i> 介護施設検索</router-link>
                    <router-link class="nav-item" :to="{ name: 'hospital_search' }"><i class="fas fa-briefcase-medical"></i> 病院検索</router-link>
                    <router-link class="nav-item" :to="{ name: 'jobSearch' }"><i class="fas fa-users"></i> 求人検索</router-link>
                  
                </ul>

            </div>
        </nav>
        <div class="card">
            <main>
                <slot />
            </main>
        </div>
    </div>

</template>

