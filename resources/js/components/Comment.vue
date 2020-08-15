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
          <button @click="displayUpdate(post.id,post.comment)">編集</button>
          <button @click="deleteComment(post.id)">削除</button>
        </li>
      </ul>
    </div>

    <!-- 編集フォーム -->
    <div v-if="updateForm">
      <input type="text" v-model="renewComment" />
      <button @click="updateComment">編集する</button>
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
      renewComment: "",
      updateForm: false,
      updateId: "",

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
      .catch(error => {
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
      .catch(error => {
        console.log(error)
      })
    },
    // 編集フォームの表示
    displayUpdate(id,comment){
      this.updateForm = true;
      this.updateId = id;
      this.renewComment = comment;
    },
    updateComment(){
      axios
      .put('/comments/' + this.updateId,{
        comment: this.renewComment
      })
      .then(response => {
        this.getComments();
        this.updateForm = false
      })
      .catch(error => {
        console.log(error)
      })
    },
    deleteComment(id){
      axios
      .delete('/comments/' + id)
      .then(response => {
        this.getComments();
      })
    },
  }
}
</script>