import {
  POST_PENDING,
  POST_FAILURE,
  FETCH_POSTS,
  SAVE_POST
} from "../actions/types";

const initialState = {
  loading: false,
  posts: [],
  error: null,
};

const postReducer = (state = initialState, action) => {
  switch (action.type) {
    case POST_PENDING:
      return {
        ...state,
        loading: true,
      };
    case POST_FAILURE:
      return {
        ...state,
        error: action.error,
      };
    case FETCH_POSTS: {
      const posts = [];
      action.posts.forEach((post) => {
        posts[post.id] = post;
      });

      return {
        ...state,
        loading: true,
        posts,
      };
    }
    case SAVE_POST:
      return {
        ...state,
        loading: true,
        posts: {
          ...state.posts,
          [action.post.id]: action.post,
        },
      };
    default:
      return state;
  }
};

export default postReducer;
