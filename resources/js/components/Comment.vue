<template>
  <div>
    <p class="text-left font-weight-lighter">
      {{ countComment }}件のコメント
      <a data-toggle="collapse" href="#comment">▼</a>
    </p>
    <!-- コメント一覧 -->
    <div class="collapse" id="comment">
      <!-- !ログインしてたら -->
      <!-- コメント入力欄 -->
      <div>
        <input type="text" v-model="comment" />
        <button @click="addComment" class="comment_btn d-block mt-2 d-sm-inline">コメント</button>
      </div>

      <div class="comment" v-for="post in comments" :key="post.id">
        <div class="user_date text-left mt-2">
          <span class="font-weight-bold">{{ post.user.name}}</span>
          <span class="font-weight-light">{{post.updated_at}}</span>
        </div>
        <p class="content text-left">
          {{post.comment}}
          <!-- !userだったら -->
          <a class="ml-3 text-success" @click="displayUpdate(post.id,post.comment)">編集</a>
          <a class="text-danger" data-toggle="modal" data-target="#deleteModal" >削除</a>
        </p>
        <!-- 削除modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1"
        role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <p>{{post.comment}}を削除してもよろしいですか？</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" @click="deleteComment(post.id)">削除</button>
              </div>
            </div> 
          </div>
        </div>
      <!-- modal -->
      </div>
      <!-- 編集フォーム -->
      <div v-if="updateForm">
        <input type="text" v-model="renewComment" />
        <button @click="updateComment">編集する</button>
      </div>
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
      deleteId: "",
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