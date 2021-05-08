export const store = {
    state: {
        user: JSON.parse(localStorage.getItem('users')),
        token: JSON.parse(localStorage.getItem('token'))
    },
    mutations: {
        SET_TOKEN(token) {
            this.REMOVE_TOKEN()
            localStorage.setItem('token', JSON.stringify(token));
            console.log(JSON.parse(localStorage.getItem('token')))
        },
        SET_USER(user) {
            this.REMOVE_USER()
            localStorage.setItem('users', JSON.stringify(user));
            console.log(JSON.parse(localStorage.getItem('users')))
        },
        REMOVE_USER() {
            localStorage.removeItem('users')
        },
        REMOVE_TOKEN() {
            localStorage.removeItem('token')
        },
        refreshSession() {
            this.axios.get('https://id.onegaming.group/api/v1/user', {
                headers: {
                    'Authorization': 'Bearer ' + this.token
                }
            }).then(response => {
                if (response.status === 200) {
                    store.mutations.SET_USER(response.data)
                    store.mutations.SET_TOKEN(this.token)
                    return 200
                }
            }).catch(error => {
                if (error.response.status === 401) {
                    store.mutations.REMOVE_TOKEN()
                    store.mutations.REMOVE_USER()
                    window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
                    return 401
                }
            })
        }
    },
    actions: {},
    modules: {}
}