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
		<div class="card my-5 mx-3 border-white">
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
						<p>○○△△</p>
						<img src="img/good!.png" width="40px" alt="いいね">
						<span class="mr-2">3</span>
						<button class="challenge-button">みんなの作ってみた</button>
					</div>
					</template>
					<div class="w-100 mt-5 text-center">
						<a href="#" class="pagenation mb-0">＜ 1 2 3 ...  ＞</a>
					</div>
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
				imgPath: 'storage/recipes_img/'
			}	
		},
		computed: {
			...mapState({
				keyword: 'searchKeyword',
			})
		},
		methods: {
			...mapMutations([
				'inputKeyword',
			]),
			search (word) {
				console.log(word);
				axios
					.post(
						'/recipes/search',
						{
							keyword: word
						}
					)
					.then(response => {
						console.log(response);
						this.recipes = response.data;
					})
					.catch(error => {
						console.log(error);
					});
			},
		},
		created () {
			this.search(this.keyword);
		},
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

.pagenation {
  color:  #FFA500;
}
</style>
