import { push } from "connected-react-router";
import { userService } from "../services";

import {
  AUTH_FAILURE,
  AUTH_PENDING,
  AUTH_LOGIN
} from "./types";

export const login = (userInfo) => (dispatch) => {
  dispatch({ type: AUTH_PENDING });

  userService
    .login(userInfo)
    .then((user) => {
      if (Object.keys(user).length === 0) {
        const error = new Error(user.description);
        dispatch({ type: AUTH_FAILURE, error });
      } else {
        dispatch({ type: AUTH_LOGIN, user });
        dispatch(push("/"));
      }
    })
    .catch((error) => dispatch({ type: AUTH_FAILURE, error }));
};

export const logout = () => {
  localStorage.removeItem("user");
};
