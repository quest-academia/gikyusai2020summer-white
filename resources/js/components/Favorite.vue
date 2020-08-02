<template>
  <div>
    <span  v-if="isFavoritedBy"><img src="/img/good!.png"  width="10%" height="10%"></span>
    <span v-else><img src="/img/good.png" width="10%" height="10%"></span>
    <span style="font-size: 2em;" class="mx-2">
      {{ countFavorites }}
    </span>
    <span><img src="/img/twitterシェア！.png" width="10%" height="10%"></span>
  </div>
</template>

<script>
export default {
  props: {
    firstFavorite:{
      type: Boolean,
      default: false,
    },
    firstCountFavorites:{
      type: Number,
      default: 0
    },
  },
  data(){
    return{
      isFavoritedBy: this.firstFavorite,
      countFavorites: this.firstCountFavorites,
    }
  }
}
</script>