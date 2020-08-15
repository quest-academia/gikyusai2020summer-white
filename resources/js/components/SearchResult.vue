<template>
	<div class="main">
		<!--検索フォーム -->
		<!-- ! データ -->
		<div id="form1" class="text-center">
		  <div class="py-2">
			<input type="text" placeholder="キーワード検索" v-model="newKeyword">
			<button type="submit" class="btn" v-on:click="inputKeyword(newKeyword); search(newKeyword)">検索</button>
		  </div>
		</div>
		<h2 class="mt-3 ml-3">レシピ検索結果：{{ keyword }}</h2>
		<div class="card mb-5 mx-3 border-white">
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-sm-6 text-center">
						<label>お酒:</label>
						<select>
							<option>ビール</option>
							<option>焼酎</option>
							<option>ワイン</option>
							<option>カクテル</option>
						</select>
					</div>
					<div class="col-sm-6 text-center">
						<label>時間:</label>
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
						<div class="col-sm-6">
							<img v-bind:src="imgPath + recipe.img" width="100%" alt="レシピ画像">
						</div>
						<div class="col-sm-4 mt-3 mx-auto">
							<h2 v-text="recipe.name"></h2>
							<p>投稿者：{{ recipe.user.name }}</p>
							<p>調理時間：
								<span v-if="recipe.time == 1">秒</span>
								<span v-else-if="recipe.time == 2">3分</span>
								<span v-else-if="recipe.time == 3">5分</span>
								<span v-else-if="recipe.time == 4">10分</span>
							</p>
							<p>合うお酒：
								<span v-if="recipe.liqueur == 1">ビール</span>
								<span v-else-if="recipe.liqueur == 2">焼酎</span>
								<span v-else-if="recipe.liqueur == 3">カクテル</span>
								<span v-else>その他</span>
							</p>
							<button class="challenge-button">みんなの作ってみた</button>
						</div>
					</template>
				</div>
				<div class="mt-5 text-center">
					<nav>
						<ul class="pagination">
							<li v-for="page in pageRange"
								v-bind:key="page"
								v-on:click="changePage(page)"
								v-bind:class="(isCurrent(page)) ? 'active' : 'inactive'">
								{{ page }}
							</li>
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
		data () {
			return {
				newKeyword: "",
				recipes: [],
				imgPath: 'storage/recipes_img/',
				current_page: 1,
				last_page: "",
				range: 5,
			}	
		},
		computed: {
			// store.jsにある検索ワードを持ってくる
			...mapState({
				keyword: 'searchKeyword',
			}),
			// ページの範囲を決める
			pageRange () {
				return this.callRange(1, this.last_page);
			}
		},
		methods: {
			// store.jsにある検索ワード変換メソッドを持ってくる
			...mapMutations([
				'inputKeyword',
			]),
			// 検索メソッド
			search (word) {
				// 初期検索時は、必ず１ページ目を表示するように検索をかける
				axios
					.post(
						'/recipes/search',
						{
							keyword: word,
							page: 1
						}
					)
					.then(response => {
						console.log(response);
						this.recipes = response.data.data;
						this.current_page = response.data.current_page;
						this.last_page = response.data.last_page;
					})
					.catch(error => {
						console.log(error);
					});
			},
			// ページネーションの配列作成メソッド
			callRange (start, end) {
				const range = [];
				for (let i = start; i <= end; i++) {
					range.push (i);
				}
				return range;
			},
			// ページ移動メソッド
			changePage (page) {
				if (page > 0 && page <= this.last_page) {
					this.current_page = page;
					// そのページ数で検索をかける
					axios
						.post(
							'/recipes/search',
							{
								keyword: this.keyword,
								page: this.current_page
							}
						)
						.then(response => {
							console.log(response);
							this.recipes = response.data.data;
							this.current_page = response.data.current_page;
							this.last_page = response.data.last_page;
						})
						.catch(error => {
							console.log(error);
						});
				}
			},
			// ページネーション現在ページの色変更メソッド
			isCurrent (page) {
				return page == this.current_page;
			}
		},
		// 検索結果コンポーネントの表示と同時に検索を強制で実行
		created () {
			this.search(this.keyword);
		},
		// 上記強制実行のために、ルーティングを監視する
		watch: {
			'$route': 'search'
		}
	}	
</script>

<style scoped>
.main {
  color:#5D5D5E;
  font-family: 'Kosugi Maru', sans-serif;
}

.ranking {
  border-bottom: solid 10px;
  border-color:  #FFA500;
}

.ranking a{
  color: black;
} 

.ranking-title {
  font-size: 20px; 
}

select {
  width:  180px;
  height: 30px;
}

.challenge-button {
  background-color: #C6F281;
  color: #5d5d5d;
  text-align: center;
  padding: 14px;
  border-radius: 25px;
  font-family: 'Kosugi Maru', sans-serif;
}

.details {
  width: 300px;
}

.pagination {
  display: flex;
  list-style-type: none;
  color:  #FFA500;
}

.pagination li {
  border: 1px solid #ddd;
  padding: 6px 12px;
  text-align: center;
  cursor: pointer;
}

.pagination li + li {
  border-left: none;
}

.active {
  color: white;
  background-color: orange;
}
</style>
