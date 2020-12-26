import { push } from "connected-react-router";
import { userService } from "../services";

import {
  USERS_LOGIN_PENDING,
  USERS_LOGIN_SUCCESS,
  USERS_LOGIN_FAILURE,
} from "./types";

export const login = (userInfo) => (dispatch) => {
  dispatch({ type: USERS_LOGIN_PENDING });

  userService
    .login(userInfo)
    .then((user) => {
      if (Object.keys(user).length === 0) {
        const error = new Error(user.description);
        dispatch({ type: USERS_LOGIN_FAILURE, error });
      } else {
        dispatch({ type: USERS_LOGIN_SUCCESS, user });
        dispatch(push("/"));
      }
    })
    .catch((error) => dispatch({ type: USERS_LOGIN_FAILURE, error }));
};
