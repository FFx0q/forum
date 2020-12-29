import { authHeader } from "../helpers";
import { followerService } from "../services";
import {
  FETCH_USER,
  SAVE_USER,
  USER_PENDING,
  USER_FAILURE,
  ADD_USER_FOLLOWER,
  REMOVE_USER_FOLLOWER
} from "./types";

const { Authorization } = authHeader();
export const fetchUser = (login) => (dispatch) => {
  dispatch({ type: USER_PENDING });

  fetch(`http://localhost:8080/api/v1/users/${login}`, {
    headers: {
      Authorization,
    },
  })
    .then((res) => res.json())
    .then((res) => {
      if (res.statusCode !== 200) {
        const error = new Error(res.error.description);
        dispatch({ type: USER_FAILURE, error });
      }

      dispatch({ type: FETCH_USER, user: res.data });
    })
    .catch((error) => dispatch({ type: USER_FAILURE, error }));
};

export const saveUser = (data) => (dispatch) => {
  dispatch({ type: USER_PENDING });

  fetch("http://localhost:8080/api/v1/users", {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => dispatch({ type: SAVE_USER, user: res.data }))
    .catch((error) => dispatch({ type: USER_FAILURE, error }));
};

export const addFollower = (data) => (dispatch) => {
  dispatch({ type: USER_PENDING });

  followerService
    .add(data)
    .then((follower) => dispatch({ type: ADD_USER_FOLLOWER, follower }))
    .catch((error) => dispatch({ type: USER_FAILURE, error }));
}

export const removeFollower = (data) => (dispatch) => {
  dispatch({ type: USER_PENDING });

  followerService
    .remove(data)
    .then((follower) => dispatch({ type: REMOVE_USER_FOLLOWER, follower }))
    .catch((error) => dispatch({ type: USER_FAILURE, error }));
}