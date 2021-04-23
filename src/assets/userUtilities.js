// eslint-disable-next-line no-unused-vars
function createNewUser(user) {
    fetch('https://yourweb.monster/api/v1/createSite?code=' + this.user.code + "&name=" + this.user.name + "&subHeadLine=" + this.user.subHeadLine + "&text=" + this.user.text + "&birthday=" + this.user.birthday
        + "&place=" + this.user.place + "&image=" + this.user.image).catch(error => {
        if (error)
            console.error(error)
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