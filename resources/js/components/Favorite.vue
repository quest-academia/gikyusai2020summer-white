<template>
	<div>
		<h1 class="mb-3">「いいね！」機能のサンプル</h1>
		user_id: {{ challengeId }}
		<table class="table table-bordered">
			<thead class="bg-info text-white">
				<tr>
					<th>名前</th>
					<th class="text-nowrap">いいね！の回数</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<!-- ユーザーリストを表示-->
				<tr v-for="u in users">
					<td class="w-100" v-text="u.name"></td>
					<td class="w-100" v-text="u.favorites_count"></td>
					<td class="text-nowrap">
						<!-- いいね！を取り消すボタン-->
						<button
							type="button"
							class="btn btn-info"
							v-if="hasFavorite(u.favorites)"
							:disabled="myFavorite(u.id)"
							@click="removeFavorite(u.id)">
							いいねを外す
						</button>
						<!-- いいね！を実行するボタン-->
						<button
							type="button"
							class="btn btn-info"
							v-else
							:disabled="myFavorite(u.id)"
							@click="addFavorite(u.id)">
							いいね！
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		props: {
			challengeId: {
				type: Number
			}
		},
		data () {
			return {
				users: [],
			}
		},
		mounted () {
			axios
				.get(
					'/favorite/user_list'
				)
				.then(response => {
					this.users = response.data;
				})
				.catch(error => {
					console.log(error);
				});	
		},
		methods: {
			// いいね削除メソッド
			removeFavorite (userId) {
				axios
					.post(
						'/unfavorite',
						{
							user_id: userId,
							challenge_id: this.challengeId
						}
					)
					.then(response => {
						console.log(response);
						// いいね取り消しに成功したら、ユーザ一覧を更新する
						if (response.data.result == true) {
							this.users = response.data.users;
						}
					})
					.catch(error => {
						console.log(error);
					});	
			},
			// いいね追加メソッド
			addFavorite (userId) {
				axios
					.post(
						'/favorite',
						{
							user_id: userId,
							challenge_id: this.challengeId
						}
					)
					.then(response => {
						console.log(response);
						// いいね追加に成功したら、ユーザ一覧を更新する
						if (response.data.result == true) {
							this.users = response.data.users;
						}
					})
					.catch(error => {
						console.log(error);
					});	
			},
			// 自分自身をいいね出来ないように判定
			myFavorite (id) {
				if (id == this.challengeId) {
					return true;
				}
			},
			// すでにいいねしていれば、いいねを外すボタンに変える
			hasFavorite (favorites) {
				if (favorites.length) {
					for (let favorite of favorites) {
						if (favorite.challenge_id == this.challengeId) {
							return true;
						}
					}
				} 
			},
		}
	}
</script>
