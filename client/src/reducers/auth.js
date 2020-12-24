import {
  USERS_LOGIN_FAILURE,
  USERS_LOGIN_PENDING,
  USERS_LOGIN_SUCCESS,
} from "../actions/types";

const user = JSON.parse(localStorage.getItem("user"));
const initialState = user ? { loggedIn: true, user } : {};

const authReducer = (state = initialState, action) => {
  switch (action.type) {
    case USERS_LOGIN_SUCCESS:
      return {
        loggedIn: true,
        user: action.user,
      };
    case USERS_LOGIN_PENDING:
      return {
        loggedIn: true,
        user: action.user,
      };
    case USERS_LOGIN_FAILURE:
      return {};
    default:
      return state;
  }
};

export default authReducer;
