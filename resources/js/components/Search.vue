<template>
	<div class="text-center">
	</div>
</template>

<script>
	export default {
		data () {
			return {
				keyword: ""
			}
		},
		methods: {
			search () {
				this.$emit('search');
			}
		}
	}
</script>
