import { push } from "connected-react-router";
import { postService } from "../services";

import {
  FETCH_POSTS_PENDING,
  FETCH_POSTS_SUCCESS,
  FETCH_POSTS_FAILURE,
  SAVE_POST_PENDING,
  SAVE_POST_SUCCESS,
  SAVE_POST_FAILURE,
} from "./types";

export const fetchPosts = () => (dispatch) => {
  dispatch({ type: FETCH_POSTS_PENDING });

  postService
    .gellAll()
    .then((posts) => dispatch({ type: FETCH_POSTS_SUCCESS, posts }))
    .catch((error) => dispatch({ type: FETCH_POSTS_FAILURE, error }));
};

export const savePost = (data) => (dispatch) => {
  dispatch({ type: SAVE_POST_PENDING });

  postService
    .add(data)
    .then((post) => {
      dispatch({ type: SAVE_POST_SUCCESS, post });
      dispatch(push("/"));
    })
    .catch((error) => dispatch({ type: SAVE_POST_FAILURE, error }));
};
