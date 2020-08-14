<template>
  <div>
    <p class="text-left small font-weight-lighter">
      〇件のコメント▼
    </p>
    <!-- コメント一覧 -->
    <div>
      <ul>
        <li></li>
      </ul>
    </div>

    <!-- コメント入力欄 -->
    <div>
      <input type="text" v-model="comment" />
      <button @click="addComment">コメント</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    challengeId:{
      type: Number,
    }
  },
  data(){
    return{
      comment: '',
      comments: [],
      
    }
  },
  created(){
    axios
    .get('/comments/challneges'+ challengeId)
    .then(response =>{
    this.comments = response.data.comments
   	console.log(response.data.comments);
    })
    .catch(error=>console.log(error))
  },
  
  methods:{
    addComment(){
      axios
      .post('/comments',{
        comment: this.comment,
        challenge_id: this.challengeId})
      .then(response=>{
        console.log(response)
      })
      .catch(error=>console.log(error))
    },
  }
}
</script>