import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://localhost:8000/api/',
    // i can add other configuration such as header, timeout etc
})

export default instance;