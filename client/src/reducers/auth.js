import {
  USERS_LOGIN_FAILURE,
  USERS_LOGIN_PENDING,
  USERS_LOGIN_SUCCESS,
} from "../actions/types";

const user = JSON.parse(localStorage.getItem("user"));
const initialState = user ? { loggedIn: true, user, error: null } : {};

const authReducer = (state = initialState, action) => {
  switch (action.type) {
    case USERS_LOGIN_SUCCESS:
      return {
        ...state,
        loggedIn: true,
        user: action.user,
      };
    case USERS_LOGIN_PENDING:
      return {
        ...state,
        loggedIn: true,
        user: action.user,
      };
    case USERS_LOGIN_FAILURE:
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
