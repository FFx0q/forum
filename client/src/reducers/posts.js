import {
  FETCH_POSTS_PENDING,
  FETCH_POSTS_SUCCESS,
  FETCH_POSTS_FAILURE,
  SAVE_POST_PENDING,
  SAVE_POST_SUCCESS,
  SAVE_POST_FAILURE,
} from "../actions/types";

const initialState = {
  loading: false,
  posts: [],
  error: null,
};

const postReducer = (state = initialState, action) => {
  switch (action.type) {
    case SAVE_POST_PENDING:
    case FETCH_POSTS_PENDING:
      return {
        ...state,
        loading: true,
      };
    case SAVE_POST_FAILURE:
    case FETCH_POSTS_FAILURE:
      return {
        ...state,
        error: action.error,
      };
    case FETCH_POSTS_SUCCESS:
      const posts = [];
      action.posts.forEach((post) => (posts[post.id] = post));

      return {
        ...state,
        loading: true,
        posts,
      };

    case SAVE_POST_SUCCESS:
      return {
        ...state,
        loading: true,
        posts: {
          ...state.posts,
          [action.posts.id]: action.posts,
        },
      };
    default:
      return state;
  }
};

export default postReducer;
