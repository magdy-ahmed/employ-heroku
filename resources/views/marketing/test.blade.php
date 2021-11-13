<script >
import Cookies from 'js-cookie'

const via = new URL(location.href).searchParams.get('via')

if (via) {
    Cookies.set('sitesauce_affiliate', via, {
	    expires: 30,
		domain: '.sitesauce.app',
		secure: true,
		sameSite: 'lax',
	})
}
import axios from 'axios'
import Cookies from 'js-cookie'

const via = new URL(location.href).searchParams.get('via')

if (via) {
	axios
		.post(`http://127.0.0.1:8000/api/affiliate/${encodeURIcomponent(this.via)}`)
		.then(response => {
			Cookies.set('sitesauce_affiliate', response.data, { expires: 30, domain: '.sitesauce.app', secure: true, sameSite: 'lax' })
		})
		.catch(error => {
			if (!error.response || error.response.status !== 404) return console.log('Something went wrong')

			console.log('Affiliate does not exist. Register for our referral program here: https://app.sitesauce.app/affiliate')
		})
}
</script>
<div x-data="{ ...component() }" x-cloak x-init="init()">
	<template x-if="affiliate">
		<div>
			<img :src="affiliate.avatar" class="h-8 w-8 rounded-full mr-2" />
			<p>Your friend <span x-text="affiliate.name"></span> has invited you to try Sitesauce</p>
			<button>Start your trial</button>
		</div>
	</template>
</div>

<script type="text/javascript">
	import axios from 'axios'
	import Cookies from 'js-cookie'

	// We're using template tags and $nextTick so that transitions for our banner get executed, thanks Ryan for helping me figure this out!
	window.component = () => ({
		affiliate: null,
		via: new URL(location.href).searchParams.get('via'),
		init() {
			if (!this.via) return this.$nextTick(() => (this.affiliate = Cookies.getJSON('sitesauce.affiliate')))

			axios
				.post(`https://app.sitesauce.app/api/affiliate/${encodeURIComponent(this.via)}`)
				.then(response => {
					this.$nextTick(() => (this.affiliate = response.data))

					Cookies.set('sitesauce_affiliate', response.data, {
						expires: 30,
						domain: '.sitesauce.app',
						secure: true,
						sameSite: 'lax',
					})
				})
				.catch(error => {
					if (!error.response || error.response.status !== 404) return console.log('Something went wrong')

					console.log('Affiliate does not exist. Register for our referral program here: https://app.sitesauce.app/affiliate')
				})
		},
	})
</script>
