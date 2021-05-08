export const store = {
    state: {
        user: JSON.parse(localStorage.getItem('users')),
        token: JSON.parse(localStorage.getItem('token'))
    },
    mutations: {
        SET_TOKEN(token) {
            this.REMOVE_TOKEN()
            localStorage.setItem('token', JSON.stringify(token));
            console.log("set token")
        },
        SET_USER(user) {
            this.REMOVE_USER()
            localStorage.setItem('users', JSON.stringify(user));
            console.log("set user")
        },
        REMOVE_USER() {
            localStorage.removeItem('users')
        },
        REMOVE_TOKEN() {
            localStorage.removeItem('token')
        }
    },
    actions: {},
    modules: {}
}