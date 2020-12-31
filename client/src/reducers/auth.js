import {
  AUTH_FAILURE,
  AUTH_PENDING,
  AUTH_LOGIN
} from "../actions/types";

const user = JSON.parse(localStorage.getItem("user"));
const initialState = user ? { loggedIn: true, user, error: null } : {};

const authReducer = (state = initialState, action) => {
  switch (action.type) {
    case AUTH_LOGIN:
      return {
        ...state,
        loggedIn: true,
        user: action.user,
      };
    case AUTH_PENDING:
      return {
        ...state,
        loggedIn: false,
        user: action.user,
      };
    case AUTH_FAILURE:
      return {
        user: {},
        error: action.error,
        loggedIn: false,
      };
    default:
      return state;
  }
};

export default authReducer;
