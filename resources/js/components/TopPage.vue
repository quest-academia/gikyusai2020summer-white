<template>
	<div>
		<div class="time">
			<div class="cooking-time">
				<img src="img/time1.png" width="70" height="70">
				<a href="#"><img src="img/time001.png" width="70" height="70" alt="秒"></a>
				<a href="#"><img src="img/time002.png" width="70" height="70" alt="3分"></a>
				<a href="#"><img src="img/time003.png" width="70" height="70" alt="5分"></a>
			    <a href="#"><img src="img/time004.png" width="70" height="70" alt="10分"></a>
			</div>
		</div>
		<div class="top-group">
			<div class="backimg">
				<img src="img/tumami002.png" width="700" height="440" alt="おつまみの写真" class="otumami-img">
				<div class="on-group1">
					<form method="get" action="#" class="search_container">
						<input type="text" size="25" placeholder="キーワード検索">
						<button class="search-button" type="submit">
							<font-awesome-icon icon="search" size="lg"></font-awesome-icon>
						</button>
					</form>
				</div>
				<div class="on-group2">
					<p><a href="">作ってみた</a></p>
				</div>
			</div>
		</div>
		<div class="main">
			<div class="main-box1">
				<div class="main-section1">
					<h2>新発見おつまみ</h2>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
					<p><a href="#">■  まさかの〇〇と□□で△△！？</a></p>
				</div>
			</div>
			<div class="main-box2">
				<div class="main-section2">
					<h2>お酒に相性の良いおつまみ</h2>
					<div class="main-list1">
						<div class="alcohol001">
							<a href="#"><img src="img/beer.png" width="120" height="120" alt="ビール"></a>
							<p>ビール</p>
						</div>
						<div class="alcohol002">
							<a href="#"><img src="img/syoutyuu.png" width="120" height="120" alt="焼酎"></a>
							<p>焼酎</p>
						</div>
					</div>
					<div class="main-list2">
						<div class="alcohol003">
							<a href="#"><img src="img/wain.png" width="120" height="120" alt="ワイン"></a>
							<p>ワイン</p>
						</div>
						<div class="alcohol004">
							<a href="#"><img src="img/kakuteru.png" width="120" height="120" alt="カクテル"></a>
							<p>カクテル</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="text-center">
			<input type="text" v-model="keyword">
			<button class="mb-2" v-on:click="callChildSearchMethod">検索</button>
			<search-result v-show="isSearchResult" ref="result" v-bind:keyword="keyword"></search-result>
			<top-title v-show="!isSearchResult"></top-title>
		</div>
    </div>
</template>

<script>
    import Search from './Search.vue';
    import TopTitle from './TopTitle.vue';
    import SearchResult from './SearchResult.vue';
    export default {
        data () {
            return {
                keyword :'',
                isSearchResult :false,
            }
        },
        components: {
            Search,
            TopTitle,
            SearchResult
        },
		created () {
			console.log("TopPage");
		},
        methods: {
            callChildSearchMethod () {
                this.isSearchResult = true;
                this.$refs.result.search();
            }
        }
    }
</script>

<style>

/*調理時間*/
.cooking-time{
  background:#FFD41F;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cooking-time img{
  margin: 5px;
}

.cooking-time a img{
  width: 70%;
  height: auto;
  margin: 8px 0px;
}

/*トップページのグループ*/

.otumami-img{
  width: 100%;
  height: auto;
  vertical-align:top;
}

.backimg{
  position: relative;

}

.on-group1{
  position: absolute;
  top:  50%;
  left: 50%;
  transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    
}

.search-button {
  background-color: initial;
  border: initial;
  width: initial;
  padding: initial;
  border-radius: initial;
}

.on-group2{
  position: absolute;
  top:  80%;
  left: 50%;
  transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
}

.on-group2 a{
  background-color: #FFD41F;
  border-radius: 20px;
  text-align: center;
  padding: 14px 40px;
  color: #fff;
  text-decoration: none;
  font-family: 'Kosugi Maru', sans-serif;
}

/*検索欄*/
.search_container{
  box-sizing: border-box;
  position: relative;
  border: 1px solid #999;
  padding: 3px 10px;
  border-radius: 20px;
  height: 3.8em;
  width: 300px;
  background-color: #fff;
}
.search_container input[type="text"]{
  font-size: 16px;
  border: none;
  height: 2.8em;
  width: 240px;
}
.search_container input[type="text"]:focus {
  outline: 0;
}
.search_container button[type="submit"]{
  cursor: pointer;
  font-family: FontAwesome;
  border: none;
  border-radius: 20%;
  background: #FF8341;
  color: #fff;
  outline : none;
  width: 2.0em;
  height: 2.0em;
}
/*メイン*/
/*新発見おつまみ*/
.main-section1{
  //height: 400px;
  background-color: #fff;
  border-radius: 30px;
  margin: 20px auto 20px auto;
  width: 80%;
  max-width: 400px;
  padding: 16px;
}

.main-section1 h2{
  margin: 0;
  padding: 0;
  text-align: center;
  font-weight: normal;
  position: relative;
  margin-bottom: 1em;
  font-size: 20px;
  color:#5D5D5E;
  font-family: 'Kosugi Maru', sans-serif;
  margin: 10px;
  padding-bottom: 6px;
}

.main-section1 h2:before{
  content: '';
  position: absolute;
  left: 27%;
  bottom: -8px;/*線の上下位置*/
  display: inline-block;
  width: 100px;/*線の長さ*/
  height: 2px;/*線の太さ*/
  background-color:#5D5D5E;/*線の色*/
  border-radius: 2px;/*線の丸み*/
}

.main-section1 p{
  padding-top: 18px;
  margin: 24px 8px 8px 15px;
  text-align: center;
  color:#5D5D5E;
  font-family: 'Kosugi Maru', sans-serif;
  font-size: 16px;
}

.main-section1 p a{
  color:#5D5D5E;
  text-decoration: none;
}
.main-section1 p a:hover{
  border-bottom:#5D5D5E solid 1px;
}
.main-section2{
  //height: 400px;
  background-color: #fff;
  border-radius: 30px;
  margin: 20px auto 10px auto;
  width: 80%;
  max-width: 400px;
  padding: 16px;
}

.main-section2 h2{
  margin: 0;
  padding: 0;
  text-align: center;
  font-weight: normal;
  position: relative;
  font-size: 20px;
  color: #5D5D5E;
  font-family: 'Kosugi Maru', sans-serif;
  margin: 10px;
  padding-bottom: 6px;
}

.main-section2 h2:before{
  content: '';
  position: absolute;
  left: 10%;
  bottom: -8px;/*線の上下位置*/
  display: inline-block;
  width: 150px;/*線の長さ*/
  height: 2px;/*線の太さ*/
  background-color: #5D5D5E;/*線の色*/
  border-radius: 2px;/*線の丸み*/
}

/*お酒に相性がいいおつまみ*/
.main:after{
 content: "";
 clear: both;
 overflow: hidden;
 display: block;
}
.main-list1{
  margin-top: 40px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
.main-list1:after{
  content: "";
  clear: both;
  display: block;
}

.alcohol001{
  float: left;
  margin-left: 10px;
  margin-right: 50px;
 
}

.alcohol002{
  float: left;
}

.main-list2{
  margin-top: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.main-list2:after{
  content: "";
  clear: both;
  display: block;
}
.alcohol003{
  float: left;
  margin-left: 10px;
  margin-right: 50px;
}
.alcohol004{
  float: left;
  
}

.alcohol001 p,.alcohol002 p,.alcohol003 p,.alcohol004 p{
  margin: 0;
  padding: 0;
  color: #5D5D5E;
  font-family: 'Kosugi Maru', sans-serif;
}

/*フッター*/
.footer{
  height: 100px;
  background-color: #FFD41F;
  text-align: right;
}

.footer p{
  padding:20px;
  color:#fff;
  font-family: 'Quicksand', sans-serif;
  font-size: 16px;
}


/*###########320px以下##############*/
@media(max-width:320px){
  .cooking-time img{
    margin: 5px 15px;
    width:50px;
    height: 50px;
  }

  .on-group1{
    position: absolute;
    top:  50%;
    left: 50%;
    transform: translate(-50%, -50%);
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      
  }

  .on-group2 a{
    background-color: #FFD41F;
    border-radius: 20px;
    text-align: center;
    padding: 10px 30px;
    color: #fff;
    text-decoration: none;
    font-size: 12px;
  }

/*検索欄*/
.search_container{
  box-sizing: border-box;
  position: relative;
  border: 1px solid #999;
  padding: 3px 10px;
  border-radius: 20px;
  height: 2.3em;
  width: 260px;
}
.search_container input[type="text"]{
  border: none;
  height: 2.0em;
}
.search_container input[type="text"]:focus {
  outline: 0;
}
.search_container input[type="submit"]{
  cursor: pointer;
  font-family: FontAwesome;
  border: none;
  border-radius: 20%;
  background: #FF8341;
  color: #fff;
  outline : none;
  width: 2.0em;
  height: 2.0em;
}
/*相性がいいおつまみ設定*/
.alcohol001 img,.alcohol002 img,.alcohol003 img,.alcohol004 img{
  width: 90px;
  height: 90px;
}

}


/*########330px~450px#########*/
@media (min-width:330px) and (max-width:450px){

  .cooking-time{
    background:#FFD41F;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .cooking-time img{
    margin: 5px 15px;
    width:60px;
    height: 60px;
  }
  .cooking-time a img{
    width: 70%;
    height: auto;
    margin: 8px 0px;
  }

  .on-group1{
    position: absolute;
    top:  50%;
    left: 50%;
    transform: translate(-50%, -50%);
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      
  }

  .on-group2 a{
    background-color: #FFD41F;
    border-radius: 20px;
    text-align: center;
    padding: 10px 30px;
    color: #fff;
    text-decoration: none;
    font-size: 13px;
  }

/*検索欄*/
.search_container{
  box-sizing: border-box;
  position: relative;
  border: 1px solid #999;
  padding: 3px 10px;
  border-radius: 20px;
  height: 2.3em;
  width: 260px;
}
.search_container input[type="text"]{
  border: none;
  height: 2.0em;
}
.search_container input[type="text"]:focus {
  outline: 0;
}
.search_container input[type="submit"]{
  cursor: pointer;
  font-family: FontAwesome;
  border: none;
  border-radius: 20%;
  background: #FF8341;
  color: #fff;
  outline : none;
  width: 2.0em;
  height: 2.0em;
}
/*相性がいいおつまみ設定*/
.alcohol001 img,.alcohol002 img,.alcohol003 img,.alcohol004 img{
  width: 100px;
  height: 100px;
}

}

/*########768px以上##########*/
@media(min-width:768px){

  .cooking-time{
    background:#FFD41F;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .cooking-time a img{
    max-width: 100px;
    max-height: 100px;
    width: auto;
    height: auto;
    margin: 5px 30px;
    
  }
/*メニューの横並び設定*/
  
.main{
  content: "";
  clear: both;
  display: block;
}
.main-box1{
  float: left;
  width: 50%;
}
.main-box2{
  float: left;
  width: 50%;
}

/*メイン*/

.main-section1 h2:before{
  content: '';
  position: absolute;
  left: 30%;
  bottom: -10px;/*線の上下位置*/
  display: inline-block;
  width: 100px;/*線の長さ*/
  height: 2px;/*線の太さ*/
  background-color: black;/*線の色*/
  border-radius: 2px;/*線の丸み*/
}

.main-section2 h2:before{
  content: '';
  position: absolute;
  left: 17%;
  bottom: -10px;/*線の上下位置*/
  display: inline-block;
  width: 150px;/*線の長さ*/
  height: 2px;/*線の太さ*/
  background-color: black;/*線の色*/
  border-radius: 2px;/*線の丸み*/
}

}
/*###############1140px以上###################*/
@media(min-width:1140px){

.main{
  width:1100px;
  margin-left: auto;
  margin-right: auto;
}

}
</style>
