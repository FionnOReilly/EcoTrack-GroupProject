import axios from "axios";

const axiosInstance = axios.create({
  baseURL: "http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public",
   withCredentials: true, // Need to add this if cookies/session-based auth is being used
  headers: {
    "Content-Type": "application/json",
  },
 
});

export default axiosInstance;
