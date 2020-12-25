import { push } from "connected-react-router";
import { userService } from "../services";

import {
  USERS_LOGIN_PENDING,
  USERS_LOGIN_SUCCESS,
  USERS_LOGIN_FAILURE,
} from "./types";

export const login = (userInfo) => {
  return (dispatch) => {
    dispatch({ type: USERS_LOGIN_PENDING });

    userService
      .login(userInfo)
      .then((user) => {
        dispatch({ type: USERS_LOGIN_SUCCESS, user });
        dispatch(push("/"));
      })
      .catch((error) => dispatch({ type: USERS_LOGIN_FAILURE, error }));
  };
};
