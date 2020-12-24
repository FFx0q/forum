import {
  USERS_LOGIN_PENDING,
  USERS_LOGIN_SUCCESS,
  USERS_LOGIN_FAILURE,
} from "./types";

export const login = (userInfo) => {
  return (dispatch) => {
    dispatch({ type: USERS_LOGIN_PENDING });

    fetch("http://localhost:8080/api/v1/auth", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(userInfo),
    })
      .then((res) => res.json())
      .then((res) => {
        localStorage.setItem("user", JSON.stringify(res.data));
        dispatch({ type: USERS_LOGIN_SUCCESS, user: res.data });
      })
      .catch((error) => dispatch({ type: USERS_LOGIN_FAILURE, error }));
  };
};