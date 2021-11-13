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
