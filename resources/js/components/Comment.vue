<template>
  <div>
    <p class="text-left small font-weight-lighter">
      {{ countComment }}件のコメント▼
    </p>
    <!-- コメント一覧 -->
    <div>
      <ul>
        <li v-for="post in comments" :key="post.id">
          {{ post.user.name}}/{{post.comment}}/{{post.updated_at}}
        </li>
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
      comment: "",
      countComment: 0, 
      comments: [],
    }
  },
  created(){
    this.getComments();
  },
  methods:{
    getComments(){
      axios
      .get('/comments/challenge/'+ this.challengeId)
      .then(response => {
        this.comments = response.data.comments;
        this.countComment = response.data.countComment;
        console.log(response.data);
      })
      .catch(error=> {
        console.log(error)
      })
    },
    addComment(){
      axios
      .post('/comments',
        {
        comment: this.comment,
        challenge_id: this.challengeId
        })
      .then(response => {
        this.getComments();
        this.comment = '';
      })
      .catch(error=>console.log(error))
    },
  }
}
</script>