<template>
  <div class="main" style="font-size: 16px;">
    <!--検索フォーム -->
    <!-- ! データ -->
    <div id="form1" class="text-center">
      <div class="py-2">
        <input type="text" placeholder="キーワード検索" v-model="newKeyword" class="text-center" />
        <button
          type="submit"
          class="btn search_btn"
          v-on:click="inputKeyword(newKeyword); searchByWord(newKeyword)"
        >検索</button>
      </div>
    </div>
    <h2 class="my-4 ml-3">レシピ検索結果：{{ keyword }}</h2>
    <div class="card mb-5 mx-sm-5 mx-4 p-4 border-white">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-6 text-center">
            <label class="font-weight-bold">お酒:</label>
            <select>
              <option>ビール</option>
              <option>焼酎</option>
              <option>ワイン</option>
              <option>カクテル</option>
            </select>
          </div>
          <div class="col-sm-6 text-center">
            <label class="font-weight-bold">時間:</label>
            <select>
              <option>秒</option>
              <option>3分</option>
              <option>5分</option>
              <option>10分</option>
            </select>
          </div>
        </div>
        <div class="row no-gutters">
          <template v-for="recipe in recipes">
            <div class="col-sm-6 p-4">
              <img v-bind:src="imgPath + recipe.img" width="100%" alt="レシピ画像" />
            </div>
            <div class="col-sm-5 mt-3 mx-auto p-4">
              <h2 v-text="recipe.name" class="mb-3"></h2>
              <p>投稿者：{{ recipe.user.name }}</p>
              <p>
                調理時間：
                <span v-if="recipe.time == 1">秒</span>
                <span v-else-if="recipe.time == 2">3分</span>
                <span v-else-if="recipe.time == 3">5分</span>
                <span v-else-if="recipe.time == 4">10分</span>
              </p>
              <p>
                合うお酒：
                <span v-if="recipe.liqueur == 1">ビール</span>
                <span v-else-if="recipe.liqueur == 2">焼酎</span>
                <span v-else-if="recipe.liqueur == 3">カクテル</span>
                <span v-else>その他</span>
              </p>
              <button class="challenge-button d-block mx-auto mt-4" v-on:click="locationChange('/recipes/show/' + recipe.id)">このレシピを見る</button>
            </div>
          </template>
        </div>
        <div class="mt-5 text-center">
          <nav>
            <ul class="pagination">
              <li
                v-for="page in pageRange"
                v-bind:key="page"
                v-on:click="changePage(page)"
                v-bind:class="(isCurrent(page)) ? 'active' : 'inactive'"
                class="mx-auto"
              >{{ page }}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import { mapMutations } from "vuex";

export default {
  data() {
    return {
      newKeyword: "",
      recipes: [],
      imgPath: "storage/recipes_img/",
      current_page: 1,
      last_page: "",
      range: 5,
    };
  },
  computed: {
    // store.jsにある検索ワードを持ってくる
    ...mapState({
      keyword: "searchKeyword",
      time: "searchTime",
    }),
    // ページの範囲を決める
    pageRange() {
      return this.callRange(1, this.last_page);
    },
  },
  methods: {
    // store.jsにある検索ワード変換メソッドを持ってくる
    ...mapMutations([
		"inputKeyword",
		"inputTime"
	]),
	// 指定のURLに遷移させるメソッド
	locationChange (url) {	
		window.location = url;
	},
    // キーワード検索メソッド
    searchByWord(word) {
      // 初期検索時は、必ず１ページ目を表示するように検索をかける
      axios
        .post("/recipes/searchByWord", {
          keyword: word,
          page: 1,
        })
        .then((response) => {
          console.log(response);
          this.recipes = response.data.data;
          this.current_page = response.data.current_page;
          this.last_page = response.data.last_page;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // 時間による検索メソッド
    searchByTime(time) {
      console.log("時間による検索を実行:時間の種類は" + time);
    },
    // ページネーションの配列作成メソッド
    callRange(start, end) {
      const range = [];
      for (let i = start; i <= end; i++) {
        range.push(i);
      }
      return range;
    },
    // ページ移動メソッド
    changePage(page) {
      if (page > 0 && page <= this.last_page) {
        this.current_page = page;
        // そのページ数で検索をかける
        axios
          .post("/recipes/searchByWord", {
            keyword: this.keyword,
            page: this.current_page,
          })
          .then((response) => {
            console.log(response);
            this.recipes = response.data.data;
            this.current_page = response.data.current_page;
            this.last_page = response.data.last_page;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    // ページネーション現在ページの色変更メソッド
    isCurrent(page) {
      return page == this.current_page;
    },
  },
  // 検索結果コンポーネントの表示と同時に検索を強制で実行
  created() {
    // 時間のプロパティが存在しない場合はキーワード検索実行
    if (this.time == null) {
      this.searchByWord(this.keyword);
      // 時間のプロパティが存在する場合は時間による検索実行
    } else {
      this.searchByTime(this.time);
    }
  },
  // 上記強制実行のために、ルーティングを監視する
  watch: {
    $route: "searchByWord",
    $route: "searchByTime",
  },
};
</script>

<style scoped>
.main {
  color: #5d5d5e;
  font-family: "Kosugi Maru", sans-serif;
}

.ranking {
  border-bottom: solid 10px;
  border-color: #ffa500;
}

.ranking a {
  color: black;
}

.ranking-title {
  font-size: 20px;
}

select {
  width: 180px;
  height: 30px;
}

.challenge-button {
  background-color: #c6f281;
  color: #5d5d5d;
  text-align: center;
  padding: 14px;
  border-radius: 25px;
  font-family: "Kosugi Maru", sans-serif;
}

.details {
  width: 300px;
}

.pagination {
  display: flex;
  list-style-type: none;
  color: #ffa500;
}

.pagination li {
  border: 1px solid #ddd;
  padding: 6px 12px;
  text-align: center;
  cursor: pointer;
}

.active {
  color: white;
  background-color: orange;
}
</style>
