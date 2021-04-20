// eslint-disable-next-line no-unused-vars
function createNewUser() {
    fetch('https://yourweb.monster/api/v1/createSite').then(result => {
        result.json().then(result => {
            this.status_menu = result
            console.log(this.status_menu)
        })
    }).catch(error => {
        console.error(error)
    })
}