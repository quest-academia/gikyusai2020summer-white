<template>
  <div>
        <!-- いいね外すボタン-->
    <input type="image" src="/img/good!.png" alt="外す" width="10%" height="10%" 
    v-if="isFavoritedBy"
    @click="removeFavorite">
        <!-- いいねつけるボタン -->
    <input type="image" src="/img/good.png" alt="外す" width="10%" height="10%" 
    v-else
    @click="addFavorite">
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
    authorized: {
      type: Boolean,
      default: false,
    },
    challengeId: {
      type: Number,
    },
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
      // !ログインしてない人は押せないように
      if(!this.authorized){
        alert('ログインしてから推してね');
        return
      }
      axios
      .put('/favorite',{
        challenge_id: this.challengeId,
      })
      .then(response =>(this.countFavorites = response.data.countFavorites))
      .catch(error => console.log(error))

      this.isFavoritedBy = true
    },
    // いいね削除メソッド
    removeFavorite(){
      axios
      .put('/unfavorite',{
        challenge_id: this.challengeId,
      })
      .then(response =>(this.countFavorites = response.data.countFavorites))
      .catch(error => console.log(error))

      this.isFavoritedBy = false
    },

  }
}
</script>
