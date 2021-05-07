export const store = {
    state: {
        user: JSON.parse(localStorage.getItem('users'))
    },
    mutations: {
        SET_USER(user) {
            localStorage.removeItem('users')
            localStorage.setItem('users', JSON.stringify(user));
            console.log(JSON.parse(localStorage.getItem('users')))
        },
        REMOVE_USER() {
            localStorage.removeItem('users')
        }
    },
    actions: {},
    modules: {}
}