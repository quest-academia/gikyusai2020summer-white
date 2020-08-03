<template>
  <div>
    {{ challengeId }}
        <!-- いいねつけるボタン-->
    <button
    type="button"
    v-if="isFavoritedBy"
    @click="addFavorite">
      <img src="/img/good!.png"  width="10%" height="10%" >
    </button>
        <!-- いいね外すボタン -->
    <button
    type="button"
    v-else
    @click="addFavorite">
      <img src="/img/good.png" @click="removeFavorite" width="10%" height="10%" >
    </button>
    <!-- いいね数表示 -->
    <span style="font-size: 2em;" class="mx-2">
      {{ countFavorites }}
    </span>
    <span>
      <img src="/img/twitterシェア！.png" width="10%" height="10%">
    </span>
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
    autrhorized: {
      type: Boolean,
      default: false,
    },
    challengeId: {
      type: Number,
    }
  },
  data(){
    return{
      isFavoritedBy: this.firstFavorite,
      countFavorites: this.firstCountFavorites,
    }
  },

  methods: {
    // いいね追加メソッド
    addFavorite(){
      axios.put('/favorite',{
        challenge_id: this.challengeId
      })
      .then(response =>(this.countFavorites = response.data.countFavorites))
      .catch(error => console.log(error))

      this.isFavoritedBy = true
    },
    // いいね削除メソッド
    removeFavorite(){
      axios.delete('/favorite',{
        challenge_id: this.challengeId
      })
      .then(response =>(this.countFavorites = response.data.countFavorites))
      .catch(error => console.log(error))

      this.isFavoritedBy = false
    },

  }
}
</script>

<style scoped>
/* button{
  all: initial; */
  /* background-color: #C6F281;
  color: #5d5d5d;
  margin: 0 auto;
  width: 200px;
  padding: 14px;
  border-radius: 25px;
  font-family: 'Kosugi Maru', sans-serif; */
/* } */
</style>