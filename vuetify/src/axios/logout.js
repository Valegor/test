import axios from "./axios"
import router from "../router/"

const logouts = () => {
    axios.post('/logout')
    .then( res => {
        localStorage.removeItem('x_xsrf_token')
        router.push({ name: 'login' })
        return res
    })
}

export{logouts}