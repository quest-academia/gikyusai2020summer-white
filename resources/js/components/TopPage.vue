<template>
	<div>
		<!-- 調理時間 -->
		<div class="time">
			<div class="cooking-time d-flex justify-content-center align-items-center">
			  <div>
          <img src="img/time1.png" class="img-fluid">
        </div>
        <div>
				  <span class="time-kind" v-on:click="inputTime(1); routerPush('/search-result')"><img src="img/time001.png" alt="秒" class="img-fluid"></span>
        </div>
        <div>
				  <span class="time-kind" v-on:click="inputTime(2); routerPush('/search-result')"><img src="img/time002.png" alt="3分" class="img-fluid"></span>
        </div>
        <div>
				  <span class="time-kind" v-on:click="inputTime(3); routerPush('/search-result')"><img src="img/time003.png" alt="5分" class="img-fluid"></span>
        </div>
        <div>
			    <span class="time-kind" v-on:click="inputTime(4); routerPush('/search-result')"><img src="img/time004.png" alt="10分" class="img-fluid"></span>
        </div>
			</div>
		</div>

		<!-- メイン画像と検索フォーム -->
		<div class="top-group">
			<div class="backimg">
				<img src="img/tumami002.png" alt="おつまみの写真" class="otumami-img img-fluid">
				<div class="on-group1">
					<div class="search_container">
						<input type="text" size="25" placeholder="キーワード検索" v-model="searchWord">
						<button class="search-button" type="submit" v-on:click="inputKeyword(searchWord); routerPush('/search-result')">
							<font-awesome-icon icon="search" size="lg"></font-awesome-icon>
						</button>
					</div>
				</div>
				<div class="on-group2">
					<p><a href="#">作ってみた</a></p>
				</div>
			</div>
		</div>

		<div class="main mx-auto p-3 d-flex flex-wrap flex-sm-nowrap justify-content-around text-center" style="font-size: 1.2rem;">
			<div class="main-box1 m-3 p-3 bg-white">
				<h3 class="p-3 mb-4 ml-sm-2 mr-sm-2">新発見おつまみ</h3>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				<p class="p-3"><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
			</div>

			<div class="main-box2 m-3 p-3 bg-white">
				<h3 class="p-3 mb-3 ml-sm-2 mr-sm-2">お酒に相性の良いおつまみ</h3>
				<div class="main-list1 d-flex justify-content-around">
					<div class="alcohol001 p-3 w-75">
						<a href="#"><img src="img/beer.png" class="img-fluid" alt="ビール"></a>
						<p class="p-2">ビール</p>
					</div>
					<div class="alcohol002 p-3 w-75">
						<a href="#"><img src="img/syoutyuu.png" class="img-fluid" alt="焼酎"></a>
						<p class="p-2">焼酎</p>
					</div>
				</div>
				<div class="main-list2 d-flex justify-content-around">
					<div class="alcohol003 p-3 w-75">
						<a href="#"><img src="img/wain.png" class="img-fluid" alt="ワイン"></a>
						<p class="p-2">ワイン</p>
					</div>
					<div class="alcohol004 p-3 w-75">
						<a href="#"><img src="img/kakuteru.png" class="img-fluid" alt="カクテル"></a>
						<p class="p-2">カクテル</p>
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
                searchWord :'',
            }
        },
        methods: {
			// store.jsにある検索ワード変換メソッドを持ってくる
            ...mapMutations([
                'inputKeyword',
                'inputTime',
            ]),
			// ルーティングを切り替えるメソッド
			routerPush (url) {	
				this.$router.push(url);
			},
        },
		// トップページコンポーネントの表示と同時にstore.jsの変数を初期化
		created () {
			this.inputKeyword(null);
			this.inputTime(null);
		},
		// 上記初期化のために、ルーティングを監視する
		watch: {
			'$route': 'searchByWord',
			'$route': 'searchByTime',
		}
    }
</script>