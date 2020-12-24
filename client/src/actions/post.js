import { authHeader } from "../helpers";
import {
  FETCH_POSTS_PENDING,
  FETCH_POSTS_SUCCESS,
  FETCH_POSTS_FAILURE,
  SAVE_POST_PENDING,
  SAVE_POST_SUCCESS,
  SAVE_POST_FAILURE,
} from "./types";

const { Authorization } = authHeader();
const headers = {
  "Content-Type": "application/json",
  Accept: "application/json",
  Authorization,
};

export const fetchPosts = () => (dispatch) => {
  dispatch({ type: FETCH_POSTS_PENDING });

  fetch("http://localhost:8080/api/v1/posts", { headers })
    .then((res) => res.json())
    .then((res) => dispatch({ type: FETCH_POSTS_SUCCESS, posts: res.data }))
    .catch((error) => dispatch({ type: FETCH_POSTS_FAILURE, error }));
};

export const savePost = (data) => (dispatch) => {
  dispatch({ type: SAVE_POST_PENDING });

  fetch("http://localhost:8080/api/v1/posts", {
    method: "POST",
    headers,
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => dispatch({ type: SAVE_POST_SUCCESS, posts: res.data }))
    .catch((error) => dispatch({ type: SAVE_POST_FAILURE, error }));
};
