import { push } from "connected-react-router";
import { postService } from "../services";

import {
  POST_PENDING,
  POST_FAILURE,
  FETCH_POSTS,
  SAVE_POST
} from "./types";

export const fetchPosts = () => (dispatch) => {
  dispatch({ type: POST_PENDING });

  postService
    .gellAll()
    .then((posts) => dispatch({ type: FETCH_POSTS, posts }))
    .catch((error) => dispatch({ type: POST_FAILURE, error }));
};

export const savePost = (data) => (dispatch) => {
  dispatch({ type: POST_PENDING });

  postService
    .add(data)
    .then((post) => {
      dispatch({ type: SAVE_POST, post });
      dispatch(push("/"));
    })
    .catch((error) => dispatch({ type: POST_FAILURE, error }));
};
