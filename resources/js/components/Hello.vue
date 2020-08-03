<template>
  <button @click="hello">Hello</button>
</template>

<script>
export default {
  methods: {
    hello: function(){
      alert("Hello!");
    },
  }
}
</script>