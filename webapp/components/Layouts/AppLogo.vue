<template>
    <div class="py-1">
        <router-link :to="{ name: 'home'}" class="flex items-center">
            <img class="inline-block h-8 rounded-md" src="/images/008-tasks.svg" alt="">
            <h1 class="ms-3 text-4xl fong-logo leading-1"> {{$store.state.info.title}} </h1>
        </router-link>
    </div>
</template>


 <style lang="css">
  .fong-logo{
    font-family: 'Lalezar', cursive;
  }
</style>
