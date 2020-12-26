import {
  SAVE_USER_PENDING,
  SAVE_USER_SUCCESS,
  SAVE_USER_FAILURE,
  FETCH_USER_PENDING,
  FETCH_USER_SUCCESS,
  FETCH_USER_FAILURE,
} from "../actions/types";

const initialState = {
  loading: false,
  users: [],
  error: null,
};

const userReducer = (state = initialState, action) => {
  switch (action.type) {
    case FETCH_USER_PENDING:
    case SAVE_USER_PENDING:
      return {
        ...state,
        loading: true,
      };
    case FETCH_USER_FAILURE:
    case SAVE_USER_FAILURE:
      return {
        ...state,
        error: action.error,
      };
    case FETCH_USER_SUCCESS:
    case SAVE_USER_SUCCESS:
      return {
        ...state,
        loading: false,
        users: action.user,
      };
    default:
      return state;
  }
};

export default userReducer;
