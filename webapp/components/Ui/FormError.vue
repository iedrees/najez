<template>
	<span class="bg-red-50 text-red-600 text-xs z-10 rounded-sm w-auto block absolute mt-px border border-red-200 p-2">
        {{errors[errorKey][0]}}
	</span>
</template>

<script>
	export default {
		props: ['errors', 'errorKey'],
	}
</script>