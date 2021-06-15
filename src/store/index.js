import {OAuth2Client} from "google-auth-library";

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
        },
        isInSession(redirect) {
            const client = new OAuth2Client("1095032961626-se382fodqvi2op0kbhmkp4i9nlutneoo.apps.googleusercontent.com");

            async function verify() {
                const ticket = await client.verifyIdToken({
                    idToken: store.state.token,
                    audience: "1095032961626-se382fodqvi2op0kbhmkp4i9nlutneoo.apps.googleusercontent.com",  // Specify the CLIENT_ID of the app that accesses the backend
                    // Or, if multiple clients access the backend:
                    //[CLIENT_ID_1, CLIENT_ID_2, CLIENT_ID_3]
                });
                const payload = ticket.getPayload();
                // eslint-disable-next-line no-unused-vars
                const userid = payload['sub'];
                // If request specified a G Suite domain:
                // const domain = payload['hd'];
            }

            verify().catch(() => {
                if (redirect == null) {
                store.mutations.REMOVE_TOKEN()
                store.mutations.REMOVE_USER()
                this.document.reload(true)
                } else {
                    window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/not-login?' + redirect : 'https://yourweb.monster/not-login?' + redirect
                }
            });
        }
    },
    actions: {},
    modules: {}
}