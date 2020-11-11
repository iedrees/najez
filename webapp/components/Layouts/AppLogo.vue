<template>
    <div class="py-2">
        <router-link :to="{ name: 'home'}" class="flex items-center">
            <img class="inline-block h-8 rounded-md" src="/images/008-tasks.svg" alt="">
            <h1 class="ms-3 font-bold text-2xl"> {{$store.state.info.title}} </h1>  
        </router-link>
    </div>
</template>
 