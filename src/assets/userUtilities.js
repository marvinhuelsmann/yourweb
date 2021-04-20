// eslint-disable-next-line no-unused-vars
function createNewUser(identifyUser, color) {
    fetch('https://yourweb.monster/api/v1/createSite?user=' + identifyUser + '&color=' + color).then(result => {
        return result.json();
    }).catch(error => {
        console.error(error)
        return error.json();
    })
}

// eslint-disable-next-line no-unused-vars
function getUserData(identifyUser, color) {
    fetch('https://yourweb.monster/api/v1/getUser?user=' + identifyUser).then(result => {
        result.json().then(result => {
            this.status_menu = result
            console.log(this.status_menu)
        })
        return result.json();
    }).catch(error => {
        console.error(error)
        return error.json();
    })
}