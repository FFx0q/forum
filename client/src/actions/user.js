import { authHeader } from "../helpers";
import {
  SAVE_USER_PENDING,
  SAVE_POST_PENDING,
  SAVE_USER_FAILURE,
  FETCH_USER_PENDING,
  FETCH_USER_SUCCESS,
  FETCH_USER_FAILURE,
} from "./types";

const { Authorization } = authHeader();
export const fetchUser = (login) => (dispatch) => {
  dispatch({ type: FETCH_USER_PENDING });

  fetch(`http://localhost:8080/api/v1/users/${login}`, {
    headers: {
      Authorization,
    },
  })
    .then((res) => res.json())
    .then((res) => dispatch({ type: FETCH_USER_SUCCESS, user: res.data }))
    .catch((error) => dispatch({ type: FETCH_USER_FAILURE, error }));
};

export const saveUser = (data) => (dispatch) => {
  dispatch({ type: SAVE_USER_PENDING });

  fetch("http://localhost:8080/api/v1/users", {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => dispatch({ type: SAVE_POST_PENDING, user: res.data }))
    .catch((error) => dispatch({ type: SAVE_USER_FAILURE, error }));
};
