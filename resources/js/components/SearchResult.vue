<template>
	<div class="text-center">
		<p>{{ keyword }}</p>
		<h1>結果</h1>
		<hr>
		<template v-for="recipe in recipes">
			<div>
				<h2 v-text="recipe.name"></h2>
				<img v-bind:src="imgPath + recipe.img" width="200px">
			</div>
			<hr>
		</template>
	</div>
</template>

<script>
	export default {
		props: {
			keyword: {
				type: String
			}
		},
		data () {
			return {
				recipes: [],
				imgPath: 'storage/recipes_img/'
			}
		},
		methods: {
			search () {
				console.log(this.keyword);
				axios
					.post(
						'/recipes/search',
						{
							keyword: this.keyword
						}
					)
					.then(response => {
						console.log(response);
						this.recipes = response.data;
					})
					.catch(error => {
						console.log(error);
					});
			}
		}
	}
</script>
