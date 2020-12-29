import {
  FETCH_USER,
  SAVE_USER,
  USER_PENDING,
  USER_FAILURE,
  ADD_USER_FOLLOWER,
  REMOVE_USER_FOLLOWER
} from "../actions/types";

const initialState = {
  loading: false,
  users: [],
  error: null,
};

const userReducer = (state = initialState, action) => {
  switch (action.type) {
    case USER_PENDING:
      return {
        ...state,
        loading: true,
      };
    case USER_FAILURE:
      return {
        ...state,
        error: action.error,
      };
    case FETCH_USER:
    case SAVE_USER:
      return {
        ...state,
        loading: false,
        users: action.user,
      };
    case ADD_USER_FOLLOWER: {
      const user = state.users;
      user.followers.push(action.follower.uid);
      return {
        ...state,
        loading: false,
        users: user,
      }
    }
    default:
      return state;
  }
};

export default userReducer;
