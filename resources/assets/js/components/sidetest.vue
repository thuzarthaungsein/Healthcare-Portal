<template>
    <div id="app">
  <button v-scroll-to="{ el: '#element' }">
    Scroll to #element (with el)
  </button>

  <button v-scroll-to="{ element: '#element' }">
    Scroll to #element (with element)
  </button>

  <h1 id="element">Hi. I'm element</h1>
</div>
</template>
<style>
    h1,button{
        margin-bottom: 100px;
    }
</style>

